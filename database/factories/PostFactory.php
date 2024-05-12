<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        // Generate fake image using Faker lib
        $image = Faker::create()->image(
            dir: public_path('uploads/posts/'),
            width:400,
            height: 300,
            category: null,
            fullPath: false
        );

        return [
            'user_id' =>  User::inRandomOrder()->first()->id, // Get a random user ID
            'title' => $this->faker->unique()->word,
            'content' => $this->faker->paragraph,
            'photo' =>  'uploads/posts/'.$image,
            'slug' =>  Str::random(15),
            'created_at' => now(),
            'deleted_at' =>  $this->faker->randomElement( [now(), null] )
        ];
    }

}
