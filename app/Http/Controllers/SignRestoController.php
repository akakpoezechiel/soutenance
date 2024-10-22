<?php

namespace App\Http\Controllers;

use App\Http\Requests\Restaurant\RestaurantRequest;
use App\Models\Restaurant;
use App\Models\User;
use App\Repositories\RestaurantRepository;
use Illuminate\Http\Request;

class SignRestoController extends Controller
{
    public function index()
    {
        return view('Restaurant.sign_up');
    }

    protected $restaurantRepository;

    public function __construct(RestaurantRepository $restaurantRepository)
    {
        $this->restaurantRepository = $restaurantRepository;
    }

    // Fonction pour enregistrer un restaurant
    public function store(Request $request)
    {
        // return $request;

        // $table->id();
        // $table->string('nom_restaurant');
        // $table->string('adresse_maps');
        // $table->string('numero_telephone');
        // $table->string('email')->unique();
        // $table->string('nom_proprietaire');
        // // $table->string('prenom_proprietaire');
        // $table->unsignedBigInteger('user_id')->nullable();

        // $table->timestamps();


        
        // Valider les données
        // $request->validate([
        //     'nom_restaurant' => 'required|string|max:255',
        //     'adresse_maps' => 'required|string',
        //     'numero_telephone' => 'required|string|max:15',
        //     'email' => 'required|email',
        //     'nom_proprietaire' => 'required|string|max:255',
        //     // 'user_id' => 'required|string',
        // ]);

        // Vérifier si l'email appartient à un administrateur
        $adminUser = User::where('email', $request->email_restaurant)->first();

        if (!$adminUser || !$adminUser->is_admin) {
            // Si l'utilisateur n'existe pas ou n'est pas admin
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à effectuer cette opération.');
        }else{
            // Si l'utilisateur est admin, on peut créer le restaurant
            $resto = new Restaurant();
            $resto->nom_restaurant = $request->nom_restaurant;
            $resto->adresse_maps = $request->adresse_restaurant;
            $resto->numero_telephone = $request->numero_telephone;
            $resto->email = $request->email_restaurant;
            $resto->nom_proprietaire = $request->nom_proprietaire;
            $resto->user_id = $adminUser->id;

            $resto->save();

            return redirect()->back()->with('succes', 'opération éffectuée avec succes.');

            
           


             // Créer le restaurant si l'utilisateur est admin
        // Restaurant::create([
        //     'nom_restaurant' => $request->nom_restaurant,
        //     'adresse_maps' => $request->adresse_maps,
        //     'numero_telephone' => $request->numero_telephone,
        //     'email' => $request->email,
        //     'nom_proprietaire' => $request->nom_proprietaire,
        //     'user_id' => $adminUser->id,
        // ]);

        // return view('restaurant.create', compact('adminId'))
        // ->with('success', 'Restaurant créé avec succès !');

        }

     

       
    }
}
