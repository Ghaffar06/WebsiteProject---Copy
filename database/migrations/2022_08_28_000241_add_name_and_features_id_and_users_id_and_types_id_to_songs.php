<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameAndFeaturesIdAndUsersIdAndTypesIdToSongs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('songs', function (Blueprint $table) {
            //
            $table->string('name')->unique();
            $table->integer('feature_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('type_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('song', function (Blueprint $table) {
            //
            $table->dropColumn('name') ;
            $table->dropColumn('feature_id') ;
            $table->dropColumn('user_id') ;
            $table->dropColumn('type_id') ;
        });
    }
}
