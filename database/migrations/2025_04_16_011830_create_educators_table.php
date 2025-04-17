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
        Schema::create('educators', function (Blueprint $table) {
            $table->id();
            $table->string('LastName');
            $table->string('FirstName');
            $table->date('BirthDayDate');
            $table->string('Adress');
            $table->string('City');
            $table->string('State');
            $table->string('Phone');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('educators');
    }
};
