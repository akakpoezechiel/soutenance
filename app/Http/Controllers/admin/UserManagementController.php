<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserManagementController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function index()
    {
        $users = User::all();  // Récupérer tous les utilisateurs
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        
        return view('admin.users.create') ;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'is_admin' => 'boolean',
        ]);

        DB::beginTransaction(); // Démarrage de la transaction

        try {
            User::create([
                'username' => $validated['username'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'is_admin' => $validated['is_admin'] ?? 0, // Par défaut, pas admin
            ]);

            DB::commit(); // Si tout est bon, on valide la transaction

            return redirect()->route('admin.users.index')->with('success', 'Utilisateur créé avec succès.');
        } catch (\Exception $e) {
            DB::rollback(); // En cas d'erreur, on annule la transaction
            return back()->withErrors(['error' => 'Erreur lors de la création de l\'utilisateur : ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', [
            'user'=>$user
        ]);
    }



    public function update(Request $request, $id  ,User $user)
    {
$user = User::find($id);
// return $user;
$user->username = $request->username;
$user->email = $request->email; 
$user->is_admin = $request->is_admin ?? 0;
// $user->update();

        // return $request;
        // $validated = $request->validate([
        //     'username' => 'required',
        //     'email' => 'required|email|unique:users,email,' . $user->id,
        //     'is_admin' => 'nullable|boolean',
        // ]);

     
        $user->update();
        
        if($user->update()){

            $users = User::all();
            return view('admin.users.index' ,compact('users'))->with('mise à jour réussie ');
        }else{
            return 'no';
        }

        // if ($user->update($validated)) {
        //     return redirect()->route('admin.users.index')->with('success', 'Utilisateur mis à jour avec succès.');
        // } else {
        //     Log::error('Échec de la mise à jour pour l\'utilisateur : ' . $user->id);
        //     return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour.');
        // }
    }
    public function destroy($id)
    {
        $user = user::find($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
