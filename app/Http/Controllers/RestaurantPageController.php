<?php

namespace App\Http\Controllers;

use App\Interfaces\ProductInterface;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantPageController extends Controller
{
    private ProductInterface $productInterface;
    public function __construct(ProductInterface $productInterface)
    {
       $this->productInterface = $productInterface;
    }
    public function index()
    {
        $products = $this->productInterface->index();

        return view('Restaurant.RestaurantPage',

        [
            'products' => $products,
         ]
    
    );
    }

    public function show(string $id) 
    {
       
        $product = Product::findOrFail($id);
        return view('Restaurant.passCommand', [
            'product' => $product
        ]);
    }


    // public function name(string $id) 
    // {
    //     $restaurant = Restaurant::findOrFail($id);
    //     return view('includes.sidebar', [
    //         'restaurant' => $restaurant,
    //     ]);
    // }

}
