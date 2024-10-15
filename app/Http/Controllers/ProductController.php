<?php

namespace App\Http\Controllers;

use App\Classes\ResponseClass;
use App\Http\Requests\Products\CreateProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Interfaces\CategoryInterface;
use App\Interfaces\ProductInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    private CategoryInterface $categoryInterface;
    private ProductInterface $productInterface;

    public function __construct(CategoryInterface $categoryInterface, ProductInterface $productInterface)
    {
        $this->categoryInterface = $categoryInterface;
        $this->productInterface = $productInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->productInterface->index();

        return view('products.index', [
            'page' => 'products',
            'products' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categoryInterface->index();

        return view("products.create", [
            "page" => "products.create",
            "categories" => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequest $request)
    {
        $data = [
            "name" => $request->name,
            "category_id" => $request->category_id,
            "price" => $request->price,

            "quantity" => $request->quantity,
            "short_description" => $request->short_description,
            "long_description" => $request->long_description,
        ];

        if ($request->hasFile("file")) {
            $file = $request->file('file');
            $destinationPath = 'db/';
            $fileName = $file->getClientOriginalName();

            if ($file->move($destinationPath, $fileName)) {
                $data['image'] = $fileName;
            } else {
                // Gérer l'erreur de téléchargement
                return response()->json(['error' => 'Echec du téléchargement du fichier'], 500);
            }
        } else {
            $data['image'] = '';
        }

        DB::beginTransaction();

        try {
            $this->productInterface->store($data);
            DB::commit();

            return ResponseClass::success();
        } catch (\Throwable $th) {
            return ResponseClass::rollback();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = $this->productInterface->show($id);
        // $products = Product::all();

        $categories = Category::all();


        return view("products.edit", [
            "page"=> "product",
            "product" => $product,
            "categories" => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        
        $data = [
            "name" => $request->name,
            "short_description" => $request->short_description,
            "long_description" => $request->long_description,
            "price" => $request->price,
            "quantity" => $request->quantity,
        ];

        if ($request->hasFile("file")) {
            $file = $request->file('file');
            $destinationPath = 'db/';
            $fileName = $file->getClientOriginalName();

            if ($file->move($destinationPath, $fileName)) {
                $data['image'] = $fileName;
            } else {
                return response()->json(['error' => 'Echec du téléchargement du fichier'], 500);
            }
        }

        DB::beginTransaction();

        try {
            $this->productInterface->update($data, $id);
            DB::commit();

            return ResponseClass::success();
        } catch (\Throwable $th) {
            return ResponseClass::rollback();
        }
    }

    public function updateQuantity(array $data, string $id) {

        DB::beginTransaction();

        $this->productInterface->update($data, $id);
        DB::commit();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->productInterface->delete($id);
        return ResponseClass::success();
    }
}
