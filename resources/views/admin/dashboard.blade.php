<!-- resources/views/admin/dashboard.blade.php -->

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
        <h1>Tableau de bord de l'administrateur</h1>

        <!-- Liste des utilisateurs -->
        <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Gérer les utilisateurs</a>
    </div>
    
</body>
</html>


