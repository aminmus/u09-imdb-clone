<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Filmwatchlist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('film_watchlist', function (Blueprint $table) {
            $table->unsignedInteger('film_id');
            $table->foreign('film_id')->references('id')-> on('film');
            $table->unsignedInteger('watchlist_id');
            $table->foreign('watchlist_id')->references('id')->on('watchlist');
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
        //
        Schema::dropIfExists('film_watchlist');
    }
}
