<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\CreateUserRequest;
use App\Interfaces\AuthInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Classes\ResponseClass;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    private AuthInterface $authInterface;

    public function __construct(AuthInterface $authInterface)
    {
        $this->authInterface = $authInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.auth');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->authInterface->index();

        $user_id = session()->get("user_id");

        return view('users.edit', [
            "page" => 'users.edit',
            "users" => $data,
            "user_id" => $user_id
        ]);
    }
    public function logine()
    {
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $data = [
            "username" => $request->username,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "is_admin" => 1,
        ];

        DB::beginTransaction();

        try {
            $this->authInterface->store($data);
            DB::commit();

            return ResponseClass::success();
        } catch (\Throwable $th) {
            return ResponseClass::rollback();
        }
    }

    public function login(Request $request)
{
    // Récupérer les informations de connexion (email et mot de passe)
    $credentials = $request->only('email', 'password');

    // Trouver l'utilisateur par email
    $user = User::where("email", $request->email)->first();

    // Vérifier si l'utilisateur existe
    if (!$user) {
        return back()->withErrors([
            'email' => 'Les informations d\'identification fournies sont incorrectes.',
        ])->onlyInput('email');
    }

    // Vérifier si le mot de passe est correct
    if (!Hash::check($request->password, $user->password)) {
        return back()->withErrors([
            'password' => 'Le mot de passe est incorrect.',
        ])->onlyInput('password');
    }

    // Stocker l'ID de l'utilisateur dans la session
    $request->session()->put("user_id", $user->id);

    // Vérifier si c'est un administrateur
    if ($user->is_admin) {
        // Rediriger l'administrateur vers le dashboard
        return redirect()->route('home');
    } else {
        // Rediriger les utilisateurs simples vers la page 'first'
        return redirect()->route('first');
    }
}


    public function logout()
    {
        session()->forget("user_id");
        return redirect()->route('authentication');
    }

    /**
     * Display the specified resource.
     */
    public function show() {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            "username" => $request->name,
        ];

        if (!empty($request->password)) {
            if ($request->password == $request->confirmation) {
                $data['password'] = Hash::make($request->password);
            } else {
                return back()->withErrors([
                    'email' => 'Les deux mots de passe ne sont pas identiques.',
                ])->onlyInput('password');
            }
        }

        DB::beginTransaction();

        try {
            $this->authInterface->update($data, $id);
            DB::commit();

            return ResponseClass::success();
        } catch (\Throwable $th) {
            return ResponseClass::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
