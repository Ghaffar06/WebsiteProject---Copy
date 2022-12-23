<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSongsAndGroupToGroupSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('groupSongs', function (Blueprint $table) {
            //
            $table->integer('group_id')->unsigned()->index() ;
            $table->integer('song_id')->unsigned()->index() ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('groupSongs', function (Blueprint $table) {
            //
            $table->drop('group_id') ;
            $table->drop('song_id' ) ;
        });
    }
}
