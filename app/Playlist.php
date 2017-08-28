<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Playlist extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        "build_from"    =>  "title",
        "save_to"       =>  "slug"
    ];

    protected $table = "playlists";

    protected $fillable = ['title', 'description', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    *   One to Many
    */
    public function youtubevideo()
    {
        return $this->hasMany(Youtubevideo::class);
    }

    /*
    *   Many to Many
    */

    public function usersfollowers()
    {
        return $this->belongsToMany(User::class, 'playlist_follower', 'playlist_id', 'user_id')->withTimestamps();
    }

    public function userscontributors()
    {
        return $this->belongsToMany(User::class, 'playlist_contributor', 'playlist_id', 'user_id')->withTimestamps();
    }
}
