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
        //
        DB::table('users')->insert([
            'username' => 'れもん',
            'mail' => 'lemon@gmail.com',
            'password' => bcrypt('lemon1111')
        ]);
        DB::table('users')->insert([
            'username' => 'りんご',
            'mail' => 'apple@gmail.com',
            'password' => bcrypt('apple2222')
        ]);
        DB::table('users')->insert([
            'username' => 'みかん',
            'mail' => 'orange@gmail.com',
            'password' => bcrypt('orange3333')
        ]);
    }
}
