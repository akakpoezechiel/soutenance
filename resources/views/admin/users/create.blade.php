<!-- resources/views/admin/users/create.blade.php -->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            body {
                background-color: #f8f9fa;
            }
            .container {
                max-width: 600px;
                margin-top: 50px;
            }
            h1 {
                text-align: center;
                margin-bottom: 30px;
            }
            .form-control, .form-check-input {
                margin-bottom: 15px;
            }
            .btn-success {
                width: 100%;
            }
        </style>

        <title>Document</title>
    </head>
    <body>
        <div class="container">
            <h1>Ajouter un utilisateur</h1>

            <button onclick="goBack()" style="background-color: rgb(25, 120, 179)">Retour</button>

    
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

        <script>
            function goBack() {
                window.history.back();
            }
        </script>
        
    </body>
    </html>

    

