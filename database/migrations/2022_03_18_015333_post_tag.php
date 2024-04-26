<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostTag extends Migration
{
    /*
    we use this migration file to create post_tag table
    such that post_tag table represent M:N relation between post table and tag table
    post_tag table has two col :
        1- post_id : pk of posts table
        2- tag_id : pk of tags table
    */

    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            $table->string('post_id');
            $table->string('tag_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_id');
        Schema::dropIfExists('tag_id');

    }
}
