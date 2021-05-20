<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        for ($i=0; $i < 4; $i++) { 
            $new_category = new Category();
            $new_category->category = $faker->sentence(rand(2, 6));
            $slug = Str::slug($new_category->category, '-');
            $find_category = Category::where('slug', $slug)->first();
            $base_slug = $slug;
            $counter = 1;
            while ($find_category) {
                $slug = $base_slug . '-' . $counter;
                $counter++;
                $find_category = Category::where('slug', $slug)->first();
            }
            $new_category->slug = $slug;
            $new_category->save();
        }
    }
}
