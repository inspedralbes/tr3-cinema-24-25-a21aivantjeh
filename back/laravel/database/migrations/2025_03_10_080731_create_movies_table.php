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
            $table->text('description');
            $table->string('genre');
            $table->string('year')->nullable();
            $table->string('rating')->nullable();
            $table->string('duration')->nullable();
            $table->string('director')->nullable();
            $table->string('writer')->nullable();
            $table->string('cast')->nullable();
            $table->string('rated')->nullable();
            $table->string('language')->nullable();
            $table->date('release_date')->nullable();
            $table->string('poster')->nullable();
            $table->string('trailer')->nullable();
            $table->string('country')->nullable();
            $table->enum('status', ['Coming soon', 'Now playing', 'Finished'])->default('coming soon');
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
