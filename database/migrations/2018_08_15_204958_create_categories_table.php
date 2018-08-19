<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique()->required();
            $table->string('slug')->unique()->required();
            $table->timestamps();

            $table->softDeletes();
        });

        Schema::create('category_post', function (Blueprint $table) {
            $table->unsignedInteger('category_id')->required();
            $table->unsignedInteger('post_id')->required();
            $table->timestamps();

            $table->softDeletes();
            $table->unique(['category_id', 'post_id']);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_post');
        Schema::dropIfExists('categories');
    }
}
