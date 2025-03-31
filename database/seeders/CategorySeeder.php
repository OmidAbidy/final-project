<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Web Development',
            'Graphic Design',
            'Digital Marketing',
            'Content Writing',
            'Mobile Development',
            'Data Entry',
            'Video Editing',
            'SEO'
        ];
    
        foreach ($categories as $category) {
            \App\Models\Category::create([
                'name' => $category,
                'slug' => Str::slug($category)
            ]);
    }
}
}