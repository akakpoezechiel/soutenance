@extends('layout.base')

@section('content')
    @include('includes.sidebar')

    <div class="wrap-content">
        @include('includes.appbar')

        <form action="{{ route('products.update', $product->id) }}" class="category-form" method="POST"  enctype="multipart/form-data">
            @csrf

            @method('PATCH')
            <br /><br /><br /><br />
            <h1>Modifier un produit</h1>

            <p>Remplir les informations du produit que vous voulez modifier.</p><br />

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

            <div>
                <img src="{{ URL::asset($product->image == '' ? 'assets/images/image-placeholder-clipart-1.png' : URL::asset('db/' . $product->image)) }}"
                    class="" alt="" style="width: 100%">
            </div>
            <select name="product_id" id="product" required>
                <option value="">Sélectionner une catégorie</option>
                @forelse ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @empty
                    <option value="">Pas de catégorie !</option>
                @endforelse
            </select>
            <label for="name"><b>Nom du produit</b></label>
            <input type="text" placeholder="Nom du produit ..." id="name" minlength="3" maxlength="128"
                name="name" value="{{ $product->name }}" />
            <br />

            <table width="100%">
                <tr>
                    <td>
                        <label for="price"><b>Prix en F CFA</b></label>
                        <input type="text" min="0" value="{{ $product->price }}" max="1000000"
                            placeholder="Prix ..." id="price" name="price" />
                    </td>
                    <td>
                        <label for="quantity"><b>Quantité</b></label>
                        <input type="number" min="1" max="1000000" placeholder="quantité ..." id="quantity"
                            name="quantity" value="{{ $product->quantity }}" />
                    </td>
                </tr>
            </table><br />

            <label for="short_description"><b>Courte description</b> [Facultatif]</label>
            <textarea name="short_description" id="short_description" rows="3"
                placeholder="Saisir une courte description ..."></textarea><br /><br />

            <label for="summernote"><b>Longue description</b> [Facultatif]</label><br /><br />
            <textarea name="long_description" id="summernote" rows="8" placeholder="Saisir une longue description ..."></textarea><br />

            <label for="file">Changer l'Image du produit</label>
            <div>
                <input type="file" name="file" id="file" placeholder="Insérez une image" class="form-control">
            </div>

            <button type="submit" class="button w-100 primary">Soumettre</button>
        </form><br /><br /><br /><br />

    </div>
@endsection

@section('js')
    <script src="{{ URL::asset('assets/summernote/summernote.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: "Saisir une lingue description ...",
                height: 150
            });
        });
    </script>
@endsection
