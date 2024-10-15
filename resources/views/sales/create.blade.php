@extends('layout.base')

@section('content')
    @include('includes.sidebar')

    <div class="wrap-content">
        @include('includes.appbar')

        <form action="{{ route('sales.store') }}" class="category-form" method="POST">
            @csrf

            <br /><br /><br /><br />
            <h1>Effectuer une nouvelle vente</h1>

            <p>Remplir les informations de la vente que vous voulez créer.</p><br />
            <p class="error-p">
            </p>
            <p class="error">
            </p>

            @if ($errors->any())
                <ul class="alert alert-danger">
                    {!! implode('', $errors->all('<li>:message</li>')) !!}
                </ul>
            @endif

            @if ($message = Session::get('error'))
                <ul class="alert alert-danger">
                    <li>{{ $message }}</li>
                </ul>
            @endif

            @if ($message = Session::get('success'))
                <ul class="alert alert-success">
                    <li>{{ $message }}</li>
                </ul>
            @endif

            <label for="product"><b>Produit</b></label>
            <select name="product_id" id="product" required>
                <option value="">Sélectionner le produit</option>
                @forelse ($products as $product)
                    <option value="{{ $product->id }}" data-price="{{ $product->price }}"
                        data-quantity="{{ $product->quantity }}" class="item">
                        {{ $product->name }}</option>
                @empty
                    <option value="">Pas de produit !</option>
                @endforelse
            </select>
            <br />

            <table width="100%">
                <tr>
                    <td>
                        <label for="price"><b>Prix en F CFA</b></label>
                        <input type="text" id="price" name="price" required>
                    </td>
                    <td>
                        <label for="quantity"><b>Quantité</b></label>
                        <input type="text" min="1" max="1000000" placeholder="quantité ..." id="quantity"
                            name="quantity" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="date"><b>Date vente</b></label>
                        <input type="date" placeholder="Date vente ..." id="date" name="date" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" id="total_price" name="total_price" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" id="total_quantity" name="total_quantity" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>Prix total : <span id="price-container"></span> </h3>
                    </td>
                </tr>

            </table>
            <br />
            <button type="submit" class="button w-100 primary" id="submit-btn">Valider la vente</button>


        </form><br /><br /><br /><br />


    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#product').on('change', function() {
                var selectedOption = $(this).find('option:selected');
                var price = selectedOption.data('price');
                $('#price').val(price);

                var selectedOption = $(this).find('option:selected');
                var quantity = selectedOption.data('quantity');
                $('#quantity').val(quantity);

                $('#total_quantity').val(quantity);

            });

            $('#price').on('input', function() {
                var inputValue = $(this).val();
                var quantity = $('#quantity').val();

                var totalPrice = inputValue * quantity;
                $('#price-container').text(totalPrice + ' XOF');
                $('#total_price').val(totalPrice);
            });

            
            $('#submit-btn').on('click', function(e) {
                var selectedOption = $('#product').find('option:selected');
                var maxQuantity = selectedOption.data('quantity');
                var quantityAuth = $('#quantity').val();

                var maxPrice = selectedOption.data('price');
                var priceAuth = $('#price').val();

                if (maxPrice != priceAuth) {
                    e.preventDefault();
                    $('.error-p').text("Vous dépassez le prix autorisé autorisée pour ce produit")
                }

                if (maxQuantity < quantityAuth) {
                    e.preventDefault();
                    $('.error').text("Vous dépassez la quantité autorisée pour ce produit")
                }
                if (quantityAuth == 0){
                    e.preventDefault();
                    $('.error').text("La quantité n'a pas été définie, Veuillez la définir")
                }

            });

            $('#quantity').on('input', function() {
                var quantity = $(this).val();
                var inputValue = $('#price').val();
    
                var totalPrice = inputValue * quantity;
                $('#price-container').text(totalPrice + ' XOF');
                $('#total_price').val(totalPrice);
            });
        });


    </script>
@endsection
