<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    public function definition()
    {
        return [
            //
        ];
    }
}

$factory->afterCreating(Author::class, function ($author, $faker) {
    $author->profile()->save($this->factory(App\Models\Profile::class)->make());
});

$factory->afterMaking(Author::class, function ($author, $faker) {
    $author->profile()->save($this->factory(App\Models\Profile::class)->make());
});
