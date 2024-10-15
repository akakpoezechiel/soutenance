@extends('layout.base')

@section('content')
    @include('includes.sidebar')

    <main class="wrap-content">
        @include('includes.appbar')

        <div class="card">

            <form action="{{ route('auth.update', $user_id) }}" class="category-form" method="POST">
                @csrf

                @method('PATCH')
                <br /><br /><br /><br />
                <h3>Modifier vos informations personnelles</h3>

                <p>Remplir les informations que vous voulez modifier.</p><br />

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

                @foreach ($users as $user)
                    @php
                        $username = $users->firstWhere('id', $user_id);
                    @endphp
                @endforeach

                <label for="name"><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Nom d'utilisateur" id="name" minlength="3" maxlength="128"
                    name="name" required value="{{ $username->username }}" />
                <br /><br />
                <label for="description"><b>Mot de passe</b></label>
                <input type="password" placeholder="Mot de passe" id="password" minlength="3" maxlength="128"
                    name="password" />
                <br><br>
                <label for="confirmation"><b>Confirmer le Mot de passe</b></label>
                <input type="password" placeholder="Confirmer le mot de passe" id="confirmation" minlength="3"
                    maxlength="128" name="confirmation" />
                <br><br>
                <button type="submit" class="button w-100 primary">Soumettre</button>
            </form>
        </div>
    </main>
@endsection
