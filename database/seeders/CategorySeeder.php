<?php

namespace Database\Seeders;

use App\Models\Category;
use FontLib\Table\Type\name;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Category::create([
            'name' => 'Brakes',
            'description' => 'Parts related to vehicle braking systems',
        ]);
        Category::create([
            'name' => 'Engines',
            'description' => 'Complete engines and engine components',
        ]);
        Category::create([
            'name' => 'Tires',
            'description' => 'Various types of tires for motor vehicles',
        ]);
        Category::create([
            'name' => 'Electrical',
            'description' => 'Electrical components like batteries and alternators',
        ]);
        Category::create([
            'name' => 'Suspension',
            'description' => 'Suspension parts like shocks and struts',
        ]);
    }
}
