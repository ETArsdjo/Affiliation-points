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
        Schema::create('additional_menues', function (Blueprint $table) {
            $table->id();
            $table->string('name_arabic');
            $table->string('name_english');
            $table->decimal('price', 10, 2); // Change the precision and scale according to your needs
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additional_menues');
    }
};
