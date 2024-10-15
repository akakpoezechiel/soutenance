<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'price',
        'quantity',
        'total_price',
        'date_sale',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function generateInvoice()
    {
        $invoice = new Invoice();
        $invoice->sale_id = $this->id;
        $invoice->invoice_number = str_pad($this->id, 8, '0', STR_PAD_LEFT);
        $invoice->invoice_date = now();
        $invoice->total_amount = $this->quantity * $this->price;
        $invoice->save();
    
        $this->generateInvoicePDF($invoice);
    
        return $invoice;
    }
    
    public function generateInvoicePDF($invoice)
    {
        $data = [
            'invoice' => $invoice,
            'sale' => $this
        ];
    
        $pdf = \PDF::loadView('invoices.invoice_pdf', $data);
    
        $filePath = storage_path('app/invoices/') . $invoice->invoice_number . '.pdf';
        $pdf->save($filePath);
    
        return $filePath; 
    }
    
}
