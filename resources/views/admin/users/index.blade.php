<!-- resources/views/admin/users/index.blade.php -->

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
        <h1>Liste des utilisateurs</h1>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Ajouter un utilisateur</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
{{-- 
       <form action="{{ route ('admin.users.store') }}" method="POST"> --}}
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom d'utilisateur</th>
                    <th>Email</th>
                    <th>Admin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->is_admin ? 'Oui' : 'Non' }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit',$user->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('admin.users.destroy',$user->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
       {{-- </form> --}}
    </div>

</body>

</html>
