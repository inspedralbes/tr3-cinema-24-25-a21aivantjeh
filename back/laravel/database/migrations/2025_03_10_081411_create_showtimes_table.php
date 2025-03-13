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
        Schema::create('showtimes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained()->onDelete('cascade');
            $table->date('show_date'); 
            $table->enum('show_time', ['16:00', '18:00', '20:00']);
            $table->decimal('price', 8, 2);
            $table->boolean('is_special_day')->default(false); 
            $table->timestamps();

            $table->unique(['movie_id', 'show_date', 'show_time']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('showtimes');
    }
};
