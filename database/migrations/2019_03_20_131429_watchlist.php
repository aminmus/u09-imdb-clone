<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Watchlist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('watchlist', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
            //Foreign keys
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')-> on('users');
            //Foreign keys
            /* $table->unsignedInteger('film_id');
            $table->foreign('film_id')->references('id')-> on('film');
            $table->timestamps(); */
        });
    }
    /* App\Watchlist::create(['name' => 'test', 'user_id' => 0, 'film_id' => 0]); */
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('watchlists');
    }
}
