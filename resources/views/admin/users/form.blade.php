<!-- resources/views/admin/users/form.blade.php -->

<div class="form-group">
    <label for="username">Nom d'utilisateur</label>
    <input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}">
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email  }}">
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
