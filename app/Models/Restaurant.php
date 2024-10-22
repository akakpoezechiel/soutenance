<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_restaurant',
        'adresse_maps',
        'numero_telephone',
        'email',
        'nom_proprietaire',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
