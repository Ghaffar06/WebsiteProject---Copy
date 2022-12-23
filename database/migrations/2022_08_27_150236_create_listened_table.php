<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListenedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listened', function (Blueprint $table) {
            $table->id();
           
            $table->timestamps();
        });
        /*Schema::table('listened', static function (Blueprint $table): void {
            $table->foreign('songs_id')->references('id')->on('songs');
            $table->foreign('users_id')->references('id')->on('users');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listened');
    }
}
