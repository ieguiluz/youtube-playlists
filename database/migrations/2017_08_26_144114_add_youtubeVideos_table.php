<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddYoutubeVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('youtubevideos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 200);
            $table->string('video_url');

            $table->integer('playlist_id')->unsigned();
            $table->timestamps();

            $table->foreign('playlist_id')->references('id')->on('playlists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('youtubevideos');
    }
}
