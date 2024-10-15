<?php

namespace App\Http\Controllers;

use App\Interfaces\ProductInterface;
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

    public function show()
    {
        return view('Restaurant.passCommand');
    }
}