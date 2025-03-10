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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('genre');
            $table->string('year');
            $table->string('rating');
            $table->integer('duration');
            $table->string('director');
            $table->string('producers');
            $table->string('cast');
            $table->string('classification');
            $table->string('language');
            $table->date('release_date');
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('country');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
