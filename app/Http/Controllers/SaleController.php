<?php

namespace App\Http\Controllers;

use App\Classes\ResponseClass;
use App\Http\Requests\Sales\CreateSaleRequest;
use App\Interfaces\CategoryInterface;
use App\Interfaces\ProductInterface;
use App\Interfaces\SaleInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SaleController extends Controller
{

    private CategoryInterface $categoryInterface;
    private ProductInterface $productInterface;
    private SaleInterface $saleInterface;


    public function __construct(ProductInterface $productInterface, CategoryInterface $categoryInterface, SaleInterface $saleInterface)
    {
        $this->productInterface = $productInterface;
        $this->categoryInterface = $categoryInterface;
        $this->saleInterface = $saleInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->productInterface->index();
        $data = $this->saleInterface->index();

        return view('sales.index', [
            'page' => 'sales',
            'sales' => $data,
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categoryInterface->index();
        $products = $this->productInterface->index();
        // $data = $this->saleInterface->index();

        return view("sales.create", [
            "page" => "sales.create",
            "products" => $products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSaleRequest $request)
    {
        $data = [
            "product_id" => $request->product_id,
            "price" => $request->price,
            "quantity" => $request->quantity,
            "total_price" => $request->price * $request->quantity,
            "date_sale" => $request->date,
        ];

        DB::beginTransaction();

        try {
            $sale = $this->saleInterface->store($data);

            $invoice = $sale->generateInvoice();

            DB::commit();

            $quantUpdate = $request->total_quantity - $request->quantity;

            $data = ['quantity' => $quantUpdate];

            $this->productInterface->updateQuantity($data, $request->product_id);

            return redirect()->route('invoices.show', ['id' => $invoice->id]);

        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }

    }

    public function checkup_show(Request $request)
    {
        $start_date = $request->input('begin_date');
        $end_date = $request->input('end_date');

        $sales = $this->saleInterface->index()->filter(function ($sale) use ($start_date, $end_date) {
            return $sale->date_sale >= $start_date && $sale->date_sale <= $end_date;
        });

        $products = $this->productInterface->index();

        return view("charts.check_up", [
            "page" => "charts.check_up",
            "products" => $products,
            "sales" => $sales,
            "start_date" => $start_date,
            "end_date" => $end_date
        ]);
    }

    public function checkup()
    {
        return view("charts.check_up");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        // $products = $this->productInterface->index();

        // $sale = $this->saleInterface->show($id);
        // return view('sales.edit', [
        //     'page' => 'sales',
        //     'sale' => $sale,
        //     'products' => $products
        // ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sales = $this->saleInterface->index();
        $products = $this->productInterface->index();

        foreach ($sales as $sale) {
            $saleWant = $sale->firstWhere('id', $id);
        }

        foreach ($products as $product) {
            $productWant = $product->firstWhere('id', $saleWant->product_id);
        }

        $quantitySell = $saleWant->quantity;

        $oldQuantity = $productWant->quantity;


        $data = ['quantity' => $quantitySell + $oldQuantity];

        $this->productInterface->updateQuantity($data, $saleWant->product_id);


        $this->saleInterface->delete($id);

        return ResponseClass::success();
    }
}
