<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class settingsTableSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->truncate();
        DB::table('settings')->insert([
            'id'            => '1',
            'name'          => 'Lara Shop',
            'email'         => 'larashop@gmail.com',
            'address'       => '132st, Kandawgi Tower, Tamwe Township, Yangon',
            'online_phone'  => '09443332200',
            'outline_phone' => '0122233',
            'price_unit'    => 'MMK',
            'size_unit'     => 'cm',
            'logo_path'     =>  '20230811_003947_64d56733396b3.jpg',
            'created_at'     => date('Y-m-d H:i:s'),
            'updated_at'     => date('Y-m-d H:i:s'),
        ]);
    }
}
