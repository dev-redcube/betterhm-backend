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
            $table->string("time");
            $table->string("fsk")->nullable();
            $table->string("genre")->nullable();
            $table->integer("length");
            $table->text("info")->nullable();
            $table->text("content")->nullable();
            $table->string("room")->nullable();
            $table->string("coverUrl")->nullable();
            $table->string("coverBlurhash")->nullable();
            $table->string("trailerUrl")->nullable();
            $table->string("unifilmUrl")->nullable();
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
