<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{

    public function run()
    {
        BlogPost::factory()->count(15)->create();
    }
}
