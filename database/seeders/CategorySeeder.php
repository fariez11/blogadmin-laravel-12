<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'HTML CSS',
            'slug' => 'html-css',
            'color' => 'bg-[#EC8368]',                               // ~> jika ingin custom color
        ]);
        Category::create([
            'name' => 'Javascript',
            'slug' => 'javascript',
            'color' => 'bg-amber-300',
        ]);
        Category::create([
            'name' => 'Laravel',
            'slug' => 'laravel',
            'color' => 'bg-red-300',
        ]);
        Category::create([
            'name' => 'React JS',
            'slug' => 'react-js',
            'color' => 'bg-cyan-300',
        ]);
    }
}
