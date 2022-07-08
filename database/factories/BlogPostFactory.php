<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(10),
            'content' => $this->faker->paragraphs(5, true),
        ];
    }
    
}
