<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_movies', function (Blueprint $table) {
            $table->id("comment_movie_id");
            $table->unsignedBigInteger("comment_movie_user_id");
            $table->foreign("comment_movie_user_id")->references("id")->on("users");
            $table->unsignedBigInteger("comment_movie_film_id");
            $table->foreign("comment_movie_film_id")->references("film_id")->on("films");
            $table->string("comment_text");
            $table->integer("comment_start_number")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_movies');
    }
};
