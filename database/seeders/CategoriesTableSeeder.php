<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Carbon\Carbon;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];
        $faker = Factory::create();
        $image_categories = ['abstract', 'animals', 'business', 'cats', 'city', 'food',
        'nature', 'technics', 'transport'];
        for($i=0;$i<8;$i++){
            $name = $faker->unique()->word();
            $name = str_replace('.', '', $name);
            $slug = str_replace(' ', '-', strtolower($name));
            $category = $image_categories[mt_rand(0, 8)];
            $image = null;
            $categories[$i] = [
                'name' => $name,
                'slug' => $slug,
                'image' => $image,
                'status' => 'PUBLISH',
                'created_at' => Carbon::now(),
            ];
        }
        DB::table('categories')->insert($categories);
    }
}
