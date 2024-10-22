<?php

namespace App\Http\Controllers;

use App\Interfaces\CategoryInterface;
use App\Interfaces\ProductInterface;
use App\Interfaces\SaleInterface;
use App\Interfaces\UserInterface;
use App\Models\Restaurant;
use Auth;

class MainController extends Controller
{
    private CategoryInterface $categoryInterface;
    private ProductInterface $productInterface;
    private SaleInterface $saleInterface;

    public function __construct(CategoryInterface $categoryInterface, ProductInterface $productInterface, SaleInterface $saleInterface)
    {
    
        $this->categoryInterface = $categoryInterface;
        $this->productInterface = $productInterface;
        $this->saleInterface = $saleInterface;
    }

    public function home($restaurant) {
        
        $categories = count($this->categoryInterface->index());
        $products = count($this->productInterface->index());
        $sales = count($this->saleInterface->index());
        $totalSales = $this->saleInterface->getTotalSales();
        $restaurante = Restaurant::findOrFail($restaurant);

        // return $restaurante->nom_restaurant;

        return view('welcome', [
            "categories" => $categories,
            "products" => $products,
            "sales" => $sales,
            "total_sales" => $totalSales,
            "restaurante" => $restaurante,
            "product_chart_by_category" => $this->productInterface->chartByCategory(),
            "sale_chart_by_category_sale" => $this->saleInterface->chartBySaleCategory(),
            "monthly_revenue_chart" => $this->saleInterface->monthlyRevenueChart()
        ]);

        

    }

    public function show(string $id) 
    {
        $restaurante = Restaurant::findOrFail($id);
        return view('includes.sidebar', [
            'restaurante' => $restaurante,
        ]);
    }
}
