<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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

            'name'=> 'Sultoni Romadhon',
            'email'=> 'sulton@gsc.or.id',
            'password'  => Hash::make('password'),
            'address'=> 'JL Sulawesi, Cilacap',
            'gender'=> 'Laki-laki',
            "occupation" => 'Developer',
        ]);


    }
}
