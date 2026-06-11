<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\File;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
///method1 using collection to seed multiple categories at once
    // $categories= collect(
    //     [
    //     [
    //         'name' => 'Pizza',
    //         'slug' => 'pizza',
    //         'description' => 'Pizza Category',
    //         'status' => 1,
    //     ],
    //     [
    //         'name' => 'Burger',
    //         'slug' => 'burger',
    //         'description' => 'Burger Category',
    //         'status' => 1,
    //     ],
    //     [
    //         'name' => 'Pasta',
    //         'slug' => 'pasta',
    //         'description' => 'Pasta Category',
    //         'status' => 1,
    //     ],
    //     [
    //         'name' => 'Salads',
    //         'slug' => 'salads',         
    //         'description' => 'Salads Category',
    //         'status' => 1,
    //     ],
    //     ]);



     
//method2 separate seeding for each category 
        // Category::create([
        //     'name' => 'Pizza',
        //     'slug' => 'pizza',
        //     'description' => 'Pizza Category',
        //     'status' => 1,
        // ]);

        // Category::create([
        //     'name' => 'Burger',
        //     'slug' => 'burger',
        //     'description' => 'Burger Category',
        //     'status' => 1,
        // ]);
           //method3 using json file to seed categories
           
        //    $categoryjson=File::get(path:'database/json/category.json');
        //     $categories=collect(json_decode($categoryjson, true));

        //        $categories->each(function($category)
        //         {
        //     Category::create([
        //         'name' => $category['name'],
        //         'slug' => $category['slug'],
        //         'description' => $category['description'],
        //         'image' => $category['image'],
        //         'status' => $category['status']


        //     ]);
        // });


        
//for testing purposes only insreting fake data using faker

for($i=0; $i<10; $i++)
{       
        Category::create([
                'name' => fake()->word(),
                'slug' => fake()->slug(),
                'description' => fake()->paragraph(),
                'image' => fake()->imageUrl(),
                'status' => fake()->boolean()


            ]);
    }
    }
 



}
