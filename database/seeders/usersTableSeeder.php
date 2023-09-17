<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'id'          => '1',
            'name'        => 'admin',
            'email'       => 'larashop@gmail.com',
            'password'    => 'password',
            'created_at'  => date('Y-m-d'),
            'updated_at'  => date('Y-m-d'),
        ]);
    }
}
