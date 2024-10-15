<?php 

namespace App\Interfaces;

interface SaleInterface
{
    public function index();
    public function show($id);
    public function store(array $data);
    public function update(array $data, $id);
    public function delete($id);
    public function chartBySaleCategory();
    public function monthlyRevenueChart();
    public function getTotalSales();
    
}
