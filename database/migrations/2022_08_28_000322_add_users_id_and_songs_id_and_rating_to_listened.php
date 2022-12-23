<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersIdAndSongsIdAndRatingToListened extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listened', function (Blueprint $table) {
            //
            $table->integer('song_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('rating') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('listened', function (Blueprint $table) {
            //
            $table->dropColumn('song_id') ;
            $table->dropColumn('user_id') ;
            $table->dropColumn('rating') ;

        });
    }
}
