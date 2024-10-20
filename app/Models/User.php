<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    /**
        * @var array<int, string>
     */

    use HasFactory;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'is_admin',
    ];


    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }
}
