<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsernameAndRolesIdAndRegionsIdAndBirthdateAndAboutToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->integer('role_id')->unsigned()->index();
            $table->integer('region_id')->unsigned()->index()->nullable();
            $table->timestamp('birthdate')->nullable();
            $table->text('about')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('name') ;
            $table->dropColumn('username') ;
            $table->dropColumn('email') ;
            $table->dropColumn('role_id') ;
            $table->dropColumn('region_id') ;
            $table->dropColumn('birthdate') ;
            $table->dropColumn('about') ;
        });
    }
}
