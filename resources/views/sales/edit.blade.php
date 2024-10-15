@extends('layout.base')

@section('content')
    @include('includes.sidebar')

    <div class="wrap-content">
        @include('includes.appbar')

        <form action="{{ route('sales.update', $sale->id) }}" class="category-form" method="POST">
            @csrf
            
            @method("PATCH")
            <br /><br /><br /><br />
            <h1>Modifier une vente</h1>

            <p>Remplir les informations à modifier.</p><br />

            @if ($errors->any())
                <ul class="alert alert-danger">
                    {!! implode('', $errors->all('<li>:message</li>')) !!}
                </ul>
            @endif

            @if ($message = Session::get("error"))
                <ul class="alert alert-danger">
                    <li>{{ $message }}</li>
                </ul>
            @endif

            @if ($message = Session::get("success"))
                <ul class="alert alert-success">
                    <li>{{ $message }}</li>
                </ul>
            @endif

            <label for="product"><b>Produit</b></label>
            <select name="product_id" id="product" required>
                <option value="">Sélectionner le produit</option>
                @forelse ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @empty
                    <option value="">Pas de produit !</option>
                @endforelse
            </select>
            <br />

            <table width="100%">
                <tr>
                    <td>
                        <label for="price"><b>Prix en F CFA</b></label>
                        <input type="text" min="0" value="100" max="1000000" placeholder="Prix ..."
                            id="price" name="price" required />
                    </td>
                    <td>
                        <label for="quantity"><b>Quantité</b></label>
                        <input type="number" min="1" value="10" max="1000000" placeholder="quantité ..."
                            id="quantity" name="quantity" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="price_sale"><b>Prix total en F CFA</b></label>
                        <input type="text" min="0" value="1000" max="1000000" placeholder="Prix total ..." 
                        id="price" name="price_sale" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="date"><b>Date vente</b></label>
                        <input type="date" placeholder="Date vente ..." id="price" name="date" required />
                    </td>
                </tr>
                
            </table>
            <br />
            <button type="submit" class="button w-100 primary">Soumettre</button>
        </form><br /><br /><br /><br />

    </div>
@endsection
