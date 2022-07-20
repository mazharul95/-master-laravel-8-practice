<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleContentToBlogPostsTable extends Migration
{
    public function up()
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->string('title')->nullable()->default('');

            if (env('DB_CONNECTION') === 'sqlite_testing') {
                $table->text('content')->nullable()->default('');
            } else {
                $table->text('content');
            }
        });
    }

    public function down()
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropColumn(['title', 'content']);
        });
    }
}
