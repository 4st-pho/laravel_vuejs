<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' =>'dienthoai'
        ]);
        Category::create([
            'name' =>'xe'
        ]);
        Category::create([
            'name' =>'honda',
            'parent_id' => '2'
        ]);
        Category::create([
            'name' =>'yamaha',
            'parent_id' => '2'
        ]);
        Category::create([
            'name' =>'dream',
            'parent_id' => '2'
        ]);
        Category::create([
            'name' =>'iphone',
            'parent_id' => '1'
        ]);
        Category::create([
            'name' =>'samsung',
            'parent_id' => '1'
        ]);
        Category::create([
            'name' =>'bphone',
            'parent_id' => '1'
        ]);
    }
}
