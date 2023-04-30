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
        Schema::create('film_watch_records', function (Blueprint $table) {
            $table->id("film_watch_record_id");
            $table->unsignedBigInteger("film_watch_record_user_id");
            $table->foreign("film_watch_record_user_id")->references("id")->on("users");
            $table->unsignedBigInteger("film_watch_record_film_id");
            $table->foreign("film_watch_record_film_id")->references("film_id")->on("films");
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
        Schema::dropIfExists('film_watch_records');
    }
};
