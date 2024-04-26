<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Profile;
use App\Models\Tag;
use App\Models\Post;


class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 10 users
        User::factory(10)->create();

        // create 10 profiles for users
        Profile::factory(10)->create();

        // create 10 tags
        $tags = Tag::factory(10)->create();

        // create 10 posts
        $posts = Post::factory(10)->create();

        // Attach random tags to each post
        foreach( $posts as $post ){
            $post->tag()->attach( $tags->random(2) );
        }


         // create admin
         User::create([
            'name' => 'admin1',
            'email' => 'admin1'.'@gmail.com',
            'password' => bcrypt('123456'),
            'is_admin' => '1',
            'remember_token' => Str::random(10),
        ]);

    }
}
