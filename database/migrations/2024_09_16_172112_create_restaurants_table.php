<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('nom_restaurant');
            $table->string('adresse_maps');
            $table->string('numero_telephone');
            $table->string('email')->unique();
            $table->string('nom_proprietaire');
            // $table->string('prenom_proprietaire');
            $table->unsignedBigInteger('user_id')->nullable();

            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('restaurants', function (Blueprint $table) {
            // Supprimer la clé étrangère et la colonne
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
