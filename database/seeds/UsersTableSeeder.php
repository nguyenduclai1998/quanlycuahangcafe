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
            'name' => 'Trần Việt Tiến',
            'email' => 'tranviettien@gmail.com',
            'password' => Hash::make('12345678'),
            'role_id' => 0,
            'user_code' => 'TRAN-VIET-TIEN',
            'id_card' => 123456789,
            'gender' => 0,
            'status' => 0
        ]);
    }
}
