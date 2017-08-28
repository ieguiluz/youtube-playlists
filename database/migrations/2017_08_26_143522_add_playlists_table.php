<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPlaylistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 200);
            $table->text('description');

            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        //Playlists & Users(followers) = playlist & user(follower) = playlist_follower
        Schema::create('playlist_follower', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('playlist_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('playlist_id')->references('id')->on('playlists');
            $table->foreign('user_id')->references('id')->on('users');
        });

        //Playlists & Users(contributors) = playlist & user(contributor) = playlist_contributor
        Schema::create('playlist_contributor', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('playlist_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('playlist_id')->references('id')->on('playlists');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('playlists');
    }
}
