<!-- resources/views/admin/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <button onclick="goBack()" style="background-color: rgb(25, 120, 179)">Retour</button>


    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            text-align: center;
        }
        h1 {
            margin-bottom: 30px;
        }
        .btn-primary {
            font-size: 1.2em;
            padding: 10px 20px;
        }
    </style>

    <title>Document</title>
</head>
<body>

    
    <div class="container">
        <h1>Tableau de bord de l'administrateur</h1>

        <!-- Liste des utilisateurs -->
        <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Gérer les utilisateurs</a>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    
</body>
</html>


