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
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'Thanh Vien 01',
                    'email' => 'member01@gmail.com',
                    'password' => Hash::make('12345'),
                    'level' => 2
                ],
                [
                    'name' => 'Thanh Vien 02',
                    'email' => 'member02@gmail.com',
                    'password' => Hash::make('12345'),
                    'level' => 2
                ],
                [
                    'name' => 'Quantrivien',
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('12345'),
                    'level' => 1
                ]
                
            ]
        );
    }
}
