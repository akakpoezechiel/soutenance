<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_restaurant',
        'adresse_restaurant',
        'nom',
        'prenom',
        'adresse',
        'numero_telephone',
        'identifiant_de_connexion',
        'mot_de_passe'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
