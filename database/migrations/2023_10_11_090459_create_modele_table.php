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
        Schema::create('modele', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->integer("cylindree")->nullable();
            $table->unsignedBigInteger('id_marque'); // Colonne de la clé étrangère
            $table->foreign('id_marque')->references('id')->on('marque'); // Clé étrangère liée à la table 'users'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modele');
    }
};
