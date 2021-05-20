<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        for ($i=0; $i < 20; $i++) { 
            $new_post = new Post();
            $new_post->title = $faker->sentence(rand(2,8));
            $new_post->content = $faker->text(rand(100,200));
            /* genero e controllo se slug è già presente nel db */
            $slug = Str::slug($new_post->title, '-');
            $find_post = Post::where('slug', $slug)->first();
            $base_slug = $slug; 
            $counter = 1;
            while($find_post) {
                $slug = $base_slug . '-' . $counter;
                $counter++;
                $find_post = Post::where('slug', $slug)->first();
            }
            $new_post->slug = $slug;
            $new_post->user_id = $faker-> numberBetween(1, App\User::count());
            $new_post->save();
        }
    }
}
