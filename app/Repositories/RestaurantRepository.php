<?php

namespace App\Repositories;

use App\Interfaces\RestaurantInterface;
use App\Mail\Resto_Id_Email;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RestaurantRepository implements RestaurantInterface
{
    /**
     * Create a new class instance.
     */
    // public function __construct()
    // {
    //     //
    // }

    public function create(array $data)
    {
        $filtrFirstname = substr($data['prenom'], 0, 2);
        $filtrLastname = substr($data['nom'], 0, 2);
        $filtrRestoName1 = substr($data['nom_restaurant'], 0, 1);
        $restoLength = strlen($data['nom_restaurant']);

        $identifiant = strtolower($filtrFirstname . $filtrLastname . $filtrRestoName1 . $restoLength . '-funny');
        $restoPassword = rand(11111111, 99999999);

        $createRest = Restaurant::create([
            'nom_restaurant' => $data['nom_restaurant'],
            'adresse_restaurant' => $data['adresse_restaurant'],
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'adresse' => $data['adresse'],
            'numero_telephone' => $data['numero_telephone'],
            'identifiant_de_connexion' => $identifiant,
            'mot_de_passe' => $restoPassword,
        ]);


        $email = 'ezechielakakpo3@gmail.com';
        $name = null;

        if (Auth::check()) {
            $user = Auth::user();
            // Récupérer les informations
            $name = $user->username;
            // Récupérer l'adresse e-mail de l'utilisateur si connecté, sinon renvoyer une erreur ou un message d'erreur sur la page de connexion ou d'inscription.
            $email = $user->email;
        } else {
            // Aucun utilisateur n'est connecté
        }

        Mail::to($email)->send(new Resto_Id_Email($name, $restoPassword, $identifiant));

        return $createRest;

    }
}
