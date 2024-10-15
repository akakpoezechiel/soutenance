<!DOCTYPE html>
<title>Facture de vente</title>
{{-- <link rel="stylesheet" href="{{ URL::asset('assets/fontawesome/css/all.min.css') }}"> --}}
<html>

<head>
    <title>Facture de vente</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            padding: 50px 150px;
            margin: 0;
        }

        .invoice-box {
            width: 100%;
            height: 400px;
            padding: 10px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border: 3px solid red;
            border-radius: 10px
        }

        .content {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 50px;
        }

        .invoice-box table {
            width: 100%;
            text-align: center;
            border: 1px solid #111
        }

        .invoice-box table th {
            background: #ccc;
            height: 30px;
        }

        .invoice-box table tr {
            background: aqua;
            height: 30px;
        }

        a {
            text-decoration: none;
            text-align: center;
        }
    </style>
</head>

<body>
    <main class="content">
        <div class="invoice-box" id="invoices">
            <h1>Supermarché Benef-Market</h1>
            <h2>Facture n°{{ $invoice->invoice_number }}</h2>
            <p>Date: {{ $invoice->invoice_date }}</p>


            <table>
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $invoice->sale->product->name }}</td>
                        <td>{{ $invoice->sale->quantity }}</td>
                        <td>{{ number_format($invoice->sale->price) }}</td>
                        <td>{{ number_format($invoice->sale->total_price) }}</td>
                    </tr>
                </tbody>
            </table>

            <h3>Total: {{ number_format($invoice->total_amount) }} XOF</h3>
        </div>
        <a href="{{ isset($pdfUrl) ? $pdfUrl : '#' }}" target="_blank"><i class="fas fa-file-export"></i> Télécharger la
            facture (PDF)</a>
    </main>

</body>

</div>

</body>

</html>
