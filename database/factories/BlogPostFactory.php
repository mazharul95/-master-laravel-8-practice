<?php

namespace Database\Factories;

use App\Models\BlogPost;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostFactory extends Factory
{
    protected $model = BlogPost::class;

    public function definition()
    {
        return [
            'user_id' => function () {
                return User::factory()->create()->id;
            },

            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraphs(5, true),
            'created_at' => $this->faker->dateTimeBetween('-3 months'),
        ];

        $this->factory->state(App\Models\BlogPost::class, 'new-title', function (Faker $faker) {
            return [
                'title' => 'New title',
            ];
        });
    }

}
