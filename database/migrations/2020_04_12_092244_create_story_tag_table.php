<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoryTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('story_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('story_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();

            $table->unique(['story_id', 'tag_id']);

            $table->foreign('story_id')
                ->references('id')
                ->on('stories')
                ->onDelete('cascade');

            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade');
        });

        Schema::create('poem_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('poem_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();

            $table->unique(['poem_id', 'tag_id']);

            $table->foreign('poem_id')
                ->references('id')
                ->on('poems')
                ->onDelete('cascade');

            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade');
        });

        Schema::create('review_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('review_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();

            $table->unique(['review_id', 'tag_id']);

            $table->foreign('review_id')
                ->references('id')
                ->on('reviews')
                ->onDelete('cascade');

            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('story_tag');
    }
}
