<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Get all user IDs
        $userIds = User::all()->modelKeys();

        return [
            'user_id' => $this->faker->unique()->randomElement($userIds), // Get a random unique user ID
            'photo' => 'uploads/users/user.jpg',
            'gender' => 'male',
            'bio' => 'hello world',
            'facebook' => 'www.facebook.com',
            'city' => 'alexandria',
            'created_at' => now(),
        ];
    }

}
