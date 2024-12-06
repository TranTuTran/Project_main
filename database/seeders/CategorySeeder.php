<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Apple',
                    'parent_id' => 0
                ],
                [
                    'id' => 2,
                    'name' => 'Samsung',
                    'parent_id' => 0
                ],
                [
                    'id' => 3,
                    'name' => 'iPhone',
                    'parent_id' => 1
                ],
                [
                    'id' => 4,
                    'name' => 'iPad',
                    'parent_id' => 1
                ],
                [
                    'id' => 5,
                    'name' => 'Galaxy',
                    'parent_id' => 2
                ],
                [
                    'id' => 6,
                    'name' => 'Note 9',
                    'parent_id' => 2
                ],
                [
                    'id' => 7,
                    'name' => 'iPhone 16',
                    'parent_id' => 3
                ],
                [
                    'id' => 8,
                    'name' => 'iPad Gen 9',
                    'parent_id' => 4
                ]
            ]
        );
    }
}
