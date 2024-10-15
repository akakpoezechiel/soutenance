<?php

namespace App\Repositories;

use App\Charts\SaleChart;
use App\Interfaces\SaleInterface;
use App\Models\Sale;

class SaleRepository implements SaleInterface
{
    public function index()
    {
        return Sale::all();
    }
    public function show($id)
    {
        return Sale::findOrFail($id);
    }
    public function store(array $data)
    {
        return Sale::create($data);
    }
    public function update(array $data, $id)
    {

    }
    public function delete($id)
    {
        return Sale::destroy($id);
    }
    
    public function getTotalSales()
    {
        return Sale::sum('total_price');
    }

    public function chartBySaleCategory()
    {
        // Récupérer les ventes groupées par catégorie et compter le nombre de ventes pour chaque catégorie
        $mostSold = Sale::join('products', 'sales.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('categories.name as category_name', Sale::raw('SUM(sales.quantity) as total'))
            ->groupBy('categories.id', 'categories.name')
            ->orderBy('total', 'desc')
            ->take(10)
            ->get();

        $json_data = json_decode($mostSold, true);

        $names = [];
        $count = [];

        foreach ($json_data as $item) {
            $count[] = $item['total'];
            $names[] = $item['category_name'];
        }

        $chart = new SaleChart();
        $chart->labels($names);
        $chart->dataset("Produits les plus vendus par catégorie", "doughnut", $count)->options([
            'backgroundColor' => ['#046e24', "#dd4c09", "#0b7ad4", "#b20bd4", "#d1163e", "#178897", "#587512"],
        ]);

        return $chart;
    }

    public function monthlyRevenueChart()
    {
        $sales = Sale::select(
            Sale::raw('strftime(\'%m\', date_sale) as month'),
            Sale::raw('SUM(total_price) as total')
        )
            ->groupBy(Sale::raw('strftime(\'%m\', date_sale)'))
            ->get();

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

        $monthlySales = array_fill(0, 12, 0);

        foreach ($sales as $sale) {
            $monthlySales[intval($sale->month) - 1] = $sale->total;
        }

        $chart = new SaleChart();
        $chart->labels(array_values($months));
        $chart->dataset("Chiffre d'affaires mensuel", "bar", $monthlySales)->options([
            'backgroundColor' => ['#046e24', "#dd4c09", "#0b7ad4", "#b20bd4", "#d1163e", "#178897", "#587512", "#FFD700", "#8A2BE2", "#FF4500", "#00FF7F", "#1E90FF"],
        ]);

        return $chart;
    }

}
