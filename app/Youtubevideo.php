<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Youtubevideo extends Model
{
    protected $table = "youtubevideos";

    protected $fillable = ['title', 'video_url', 'playlist_id'];

    public function playlist()
    {
        return $this->belongsTo(Playlist::class);
    }
}
