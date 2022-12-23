<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameAndSongsAndUserToPlaylists extends Migration
{
    
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::table('playlists', function (Blueprint $table) {
                //
                $table->string('name')->unique();
                $table->integer('user_id')->unsigned()->index() ;
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
            Schema::table('playlists', function (Blueprint $table) {
                //
                $table->dropColumn('name') ;
                $table->dropColumn('user_id') ;
                $table->dropColumn('song_id') ;
            });
        }
    
    
}
