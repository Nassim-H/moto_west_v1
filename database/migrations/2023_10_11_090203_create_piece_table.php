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
        Schema::create('piece', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->integer("quantite");
            $table->integer("prix");
            $table->unsignedBigInteger('id_modele'); // Colonne de la clé étrangère
            $table->foreign('id_modele')->references('id')->on('modele'); // Clé étrangère liée à la table 'users'
            $table->unsignedBigInteger('id_localisation'); // Colonne de la clé étrangère
            $table->foreign('id_localisation')->references('id')->on('localisation'); // Clé étrangère liée à la table 'users'

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('piece');
    }
};
