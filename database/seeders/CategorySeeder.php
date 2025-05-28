<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    
    public function run(): void
    {
        Category::create([
            'name' => 'Pereda Nyeri',
            'slug' => 'pereda-nyeri'
        ]);
        
        Category::create([
            'name' => 'Vitamin',
            'slug' => 'vitamin'
        ]);
        
        Category::create([
            'name' => 'Antibiotik',
            'slug' => 'antibiotik'
        ]);
        
        Category::create([
            'name' => 'Suplemen',
            'slug' => 'suplemen'
        ]);
        
        Category::create([
            'name' => 'Batuk & Pilek',
            'slug' => 'batuk-pilek'
        ]);
        
        Category::create([
            'name' => 'Kulit & Kecantikan',
            'slug' => 'kulit-kecantikan'
        ]);
        
        Category::create([
            'name' => 'Alat Kesehatan',
            'slug' => 'alat-kesehatan'
        ]);
        
        Category::create([
            'name' => 'Saluran Pencernaan',
            'slug' => 'saluran-pencernaan'
        ]);
        
        Category::create([
            'name' => 'Kesehatan Mata',
            'slug' => 'kesehatan-mata'
        ]);
        
        Category::create([
            'name' => 'Kesehatan Jantung',
            'slug' => 'kesehatan-jantung'
        ]);
        
    }
}
