<?php

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $number_of_categories = Category::pluck('id');

        for ($i =  0 ; $i < 10; $i++) {
            
            $new_post = new Post();

            $new_post->title = $faker->text(20);
            $new_post->category_id = Arr::random($number_of_categories);
            $new_post->slug = Str::slug($new_post->title, '-');
            $new_post->content = $faker->paragraphs(2, true);
            $new_post->image = $faker->imageUrl(250, 250);

            $new_post->save();
        }
    }
}
