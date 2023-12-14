<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('account_types')->insert([
            'type' => "normal",
            'id' => 1,
        ]);
        \DB::table('account_types')->insert([
            'type' => "google",
            'id' => 2,
        ]);
        \DB::table('account_types')->insert([
            'type' => "facebook",
            'id' => 3,
        ]);
    }
}
