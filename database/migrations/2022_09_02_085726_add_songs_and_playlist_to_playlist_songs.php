<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSongsAndPlaylistToPlaylistSongs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('playlistSongs', function (Blueprint $table) {
            //
            $table->integer('playlist_id')->unsigned();
            
            $table->integer('song_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('playlistSongs', function (Blueprint $table) {
            //
            $table->drop('playlist_id') ;
            $table->drop('song_id') ;
        });
    }
}
