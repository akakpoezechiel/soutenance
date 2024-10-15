<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class ChartController extends Controller
{

    public function statPerMonths()
    {
        $months = [
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December'
        ];

        $monthlySalesData = [];

        foreach ($months as $monthNum => $monthName) {
            $sales = Sale::select(
                Sale::raw('MAX(product_id) as total'),
                Sale::raw('MIN(product_id) as minimum')
            )
                ->whereRaw("strftime('%m', date_sale) = ?", [$monthNum])
                ->groupBy('product_id')
                ->get();

            $monthlySalesData[$monthName] = $sales;
        }

        return view('charts.monthly_sales', compact('months', 'monthlySalesData'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ChartController $chartController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChartController $chartController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ChartController $chartController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChartController $chartController)
    {
        //
    }
}
