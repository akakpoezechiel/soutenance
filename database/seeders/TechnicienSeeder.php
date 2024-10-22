<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TechnicienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'technicien',
            'email' => 'technicien@gmail.com',
            'password' => Hash::make('123456789'),
            'technicien' => true,  // Définit cet utilisateur comme technicien
        ]);   
     }
}
