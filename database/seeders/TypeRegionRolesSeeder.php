<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class TypeRegionRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('types')->insert([
            'name' => 'song',
        ]);
        DB::table('regions')->insert([
            'name' => 'Damascus',
        ]);
        DB::table('roles')->insert([
            'name' => 'admin',
        ]);
        DB::table('roles')->insert([
            'name' => 'artist',
        ]);
        DB::table('roles')->insert([
            'name' => 'listener',
        ]);
        DB::table('roles')->insert([
            'name' => 'data analist',
        ]);
    }
}
