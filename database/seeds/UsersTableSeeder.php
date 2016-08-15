<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Alexander Flores',
        	'email' => 'acflores@admin.addessacorp',
        	'password' => bcrypt('123$qweR'),
        	'role' => 2,
        ]);

        DB::table('users')->insert([
            'name' => 'Riva Jojami',
            'email' => 'rfpascual@admin.addessacorp',
            'password' => bcrypt('123$qweR'),
            'role' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => bcrypt('123$qweR'),
            'role' => 0,
        ]);
    }
}
