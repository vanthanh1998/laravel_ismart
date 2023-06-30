<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            'fullname' => Str::random(10),
            'username' => 'foxrainsad',
            'password' => Hash::make('foxrainsad'),
            'phone' => '0972545440',
            'address' => '',
            'email' => 'foxrainsad@gmail.com',
            'gender' => 'Nam',
            'status' => 1,
            'level' => 1,
        ]);
    }
}
