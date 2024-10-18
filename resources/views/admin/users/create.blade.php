<!-- resources/views/admin/users/create.blade.php -->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <div class="container">
            <h1>Ajouter un utilisateur</h1>
    
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                
                @if (!isset($user))
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                @endif
                
                <div class="form-group">
                    <label for="is_admin">Administrateur</label>
                    <input type="checkbox" name="is_admin" id="is_admin" value="1" {{ isset($user) && $user->is_admin ? 'checked' : '' }}>
                </div>
                <button type="submit" class="btn btn-success">Créer</button>
            </form>
        </div>
        
    </body>
    </html>

    

