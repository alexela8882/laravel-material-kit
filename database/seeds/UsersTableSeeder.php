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
        	'email' => 'alexela8882@gmail.com',
        	'password' => bcrypt('123$qweR'),
        	'role' => 2,
        ]);

        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => bcrypt('123$qweR'),
            'role' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Jane Doe',
            'email' => 'jane@doe.com',
            'password' => bcrypt('123$qweR'),
            'role' => 0,
        ]);
    }
}
