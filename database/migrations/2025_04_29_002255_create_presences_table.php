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
        Schema::create('presences', function (Blueprint $table) {
            $table->id("id_presence");
            $table->date('dateTime');
            $table->foreignId('child_id')->constrained('children');
            $table->foreignId('educator_id')->constrained('educators');
            $table->foreignId('nursery_id')->constrained('nurseries');
        });
    }
  /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presences');
    }
};
