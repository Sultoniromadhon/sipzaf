<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class PengajuSeeder extends Seeder
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

            'name' => 'Risha D N',
            'email' => 'ndhea64@gmail.com',
            'password'  => Hash::make('ndhea64@gmail.com'),
            'address' => 'Jalan ir.sulton, Cilacap',
            'gender' => 'Perempuan',
            "occupation" => 'Pengusaha',
        ]);

    }
}
