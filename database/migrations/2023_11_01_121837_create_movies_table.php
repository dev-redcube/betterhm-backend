<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->dateTime("date");
            $table->string("fsk");
            $table->string("genre");
            $table->integer("length");
            $table->text("info");
            $table->text("content");
            $table->string("room");
            $table->string("coverUrl");
            $table->string("coverBlurhash")->nullable();
            $table->string("trailerUrl");
            $table->string("unifilmUrl");
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
