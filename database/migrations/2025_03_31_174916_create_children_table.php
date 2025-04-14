<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance');
            $table->string('adresse');
            $table->string('ville');
            $table->string('province');
            $table->string('telephone');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('children');
    }
}; 