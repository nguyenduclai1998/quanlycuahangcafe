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
            'name' => 'Dev Quèn',
            'email' => 'devquen@gmail.com',
            'password' => Hash::make('12345678'),
            'role_id' => 1,
            'user_code' => Str::random(10),
            'id_card' => 123456789,
            'gender' => 0,
            'status' => 0
        ]);
    }
}
