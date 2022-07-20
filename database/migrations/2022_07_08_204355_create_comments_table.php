<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{

    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            if (env('DB_CONNECTION') === 'mysql') {
                $table->text('content')->default('');
            } else {
                $table->text('content');
            }

            $table->unsignedInteger('blog_post_id')->index()->nullable();
            $table->foreign('blog_post_id')->references('id')->on('blog_posts');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
