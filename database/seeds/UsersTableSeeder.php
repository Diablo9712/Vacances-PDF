<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = DB::table('users')->insertGetId([
            'email' => 'admin@admin.com',
            'nom' => 'admin',
            'tel' => '06999999',
            'numero' => 'ddd',
            'cin' => 'ddddd',
            'address' => 'ddddd',
            'password' => bcrypt('000000'),
        ]);

        DB::table('user_details')->insert([
            'user_id' => $id
        ]);
    }
}
