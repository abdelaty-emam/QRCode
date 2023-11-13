<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'clothes',
                'parent_id'=>null
            ],
            [
                'name' => 'shirts',
                'parent_id'=>1

            ],

        ];

        Category::insert($data);
    }
}
