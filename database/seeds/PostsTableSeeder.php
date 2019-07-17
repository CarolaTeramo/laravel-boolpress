<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Post;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();

      for ($i=0; $i < 10; $i++) {
        $post = new Post();
        $post->title = $faker->sentence();
        $post->content = $faker->text(200);
        $post->author = $faker->firstname . ' ' . $faker->lastname;
        $post->slug = Str::slug($post->title);
        $post->save();
      }
    }
}
