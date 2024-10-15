<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

    public function download($id)
    {
        $invoice = Invoice::findOrFail($id);
        $filePath = storage_path('app/invoices/') . $invoice->invoice_number . '.pdf';

        if (!file_exists($filePath)) {
            abort(404, 'Facture non trouvée.');
        }

        return response()->file($filePath);

    }


    public function show($id)
    {
        $invoice = Invoice::with('sale.product')->findOrFail($id);

        $pdfUrl = route('invoices.download', ['id' => $id]);
    
        return view('invoices.invoice_pdf', compact('invoice', 'pdfUrl'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        //
    }
}
