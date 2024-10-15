@extends('layout.base')

@section('content')
    @include('includes.sidebar')

    <div class="wrap-content">
        
        @include('includes.appbar')

        <br /><br /><br />
        <div>
            <table width="100%">
                <tr>
                    <td>
                        <h2>Liste des ventes</h2>
                    </td>
                    <td class="text-right">
                        <a href="{{ route('sales.create') }}" class="button primary">
                            Créer
                        </a>
                    </td>
                </tr>
            </table><br />

            @if ($message = Session::get('success'))
                <ul class="alert alert-success">
                    <li>{{ $message }}</li>
                </ul>
            @endif

            <div class="border datatable-cover">
                <table id="datatable" class="stripe">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Prix total</th>
                            <th>Date</th>
                            <th width="100" class="text-center">
                                Opérations
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $sale)
                            <tr>
                                <td>
                                    @php
                                        $product = $products->firstWhere('id', $sale->product_id);
                                    @endphp
                                    {{ $product ? $product->name : 'Produit non trouvé' }}
                                </td>
                                <td>
                                    {{ number_format($sale->price) }} F CFA
                                </td>
                                <td>
                                    {{ $sale->quantity }}
                                </td>
                                <td>
                                    {{ number_format($sale->total_price) }} F CFA
                                </td>
                                <td>
                                    {{ $sale->date_sale }}
                                </td>
                                <td class="text-center">
                                    <a class="icon-button primary" data-bs-toggle="modal"
                                        data-bs-target="#ModalShow{{ $sale->id }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    &nbsp;
                                    <form class="d-inline" action="{{ route('sales.destroy', $sale->id) }}" method="POST"
                                        onsubmit="return confirm('Êtes-vous sûr(e) de vouloir supprimer le produit {{ $product ? $product->name : 'non trouvé' }} ? Cette action sera irréversible !')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="icon-button error">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                    <div class="modal fade" id="ModalShow{{ $sale->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel{{ $sale->id }}">
                                                        Détail vente</h1>
                                                </div>
                                                <div class="modal-body d-block p-2 text-bg-primary card">
                                                    <div class="p-2 text-bg-primary modal-body justify-content-center ms-5">
                                                        <div class="d-flex justify-content-start mb-2 pl-2 fs-4 ">
                                                            <strong class="me-3 ">Nom :</strong>
                                                            @php
                                                                $product = $products->firstWhere(
                                                                    'id',
                                                                    $sale->product_id,
                                                                );
                                                            @endphp
                                                            {{ $product->name }}
                                                        </div>
                                                        <div class="d-flex justify-content-start  mb-2 fs-4">
                                                            <strong class="me-3">Prix unitaire:</strong>
                                                            {{ number_format($sale->price) }} F CFA
                                                        </div>
                                                        <div class="d-flex justify-content-start  mb-2 fs-4">
                                                            <strong class="me-3">Qantité:</strong> {{ $sale->quantity }}
                                                        </div>
                                                        <div class="d-flex justify-content-start  mb-2 fs-4">
                                                            <strong class="me-3">Prix Total:</strong>
                                                            {{ number_format($sale->total_price) }} F CFA
                                                        </div>
                                                        <div class="d-flex justify-content-start  mb-2 fs-4">
                                                            <strong class="me-3">Date:</strong> {{ $sale->date_sale }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success float-end "
                                                        data-bs-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
