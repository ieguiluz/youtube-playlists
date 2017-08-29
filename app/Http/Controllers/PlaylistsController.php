<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Playlist;
use Laracasts\Flash\Flash;

class PlaylistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$playlists = Playlist::orderBy('id', 'DESC')->paginate(4);
        return view('admin.playlists.index', compact('playlists'));*/

        $userid = \Auth::user()->id;
        $myplaylists = Playlist::where('user_id', '=', $userid)->orderBy('id', 'DESC')->paginate();
        $follow = DB::table('playlist_follower')
            ->select(
                'playlist_id'
            )
            ->where('user_id', '=', $userid)->get();
        //dd($follow);
        $x = '';
        $xArray = [];
        for ($i=0; $i < count($follow); $i++) { 
            $x .= $follow[$i]->playlist_id.',';
            $xArray[] = $follow[$i]->playlist_id;
        }
        $x = substr($x, 0, -1);
        //dd($xArray);


        $playlists = Playlist::where('id', 'not in', $follow)->orderBy('id', 'DESC')->paginate();

        $playlistsFollow = Playlist::whereIn('id',$xArray)->get();
        $playlistsUnfollow = Playlist::whereNotIn('id',$xArray)->where('user_id', '!=', $userid)->get();
        //dd($playlistsUnfollow);

        return view('admin.playlists.index')
            ->with('myplaylists', $myplaylists)
            ->with('playlistsFollow', $playlistsFollow)
            ->with('playlistsUnfollow', $playlistsUnfollow);

        /*$playlists = DB::table('playlists')
            ->select()
            ->where*/
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $userid = \Auth::user()->id;
        $playlists = Playlist::where('user_id', '!=', $userid)->orderBy('id', 'DESC')->paginate(4);
        die(var_dump($playlists));
        return redirect()->route('admin.playlists.all')
            ->with('playlists', $playlists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.playlists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photo_cover_file = $request->file('photo_cover');
        if ($request->file('photo_cover'))
        {
            $photo_cover_file = $request->file('photo_cover');
            $photo_cover_name = 'playlist_cover_' . time() . '.' . $photo_cover_file->getClientOriginalExtension();
            //dd($photo_cover_name);
            $photo_cover_path = public_path() . '/img/playlists/photocovers';
            $photo_cover_file->move($photo_cover_path, $photo_cover_name);
        }

        $playlist = new Playlist($request->all());
        $playlist->photo_cover = $photo_cover_name;
        $playlist->user_id = \Auth::user()->id;
        $playlist->save();

        Flash::success("The playlist <b>" . $playlist->title . "</b> has been saved successfully!");
        return redirect()->route('admin.playlists.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function follow($id)
    {
        $userid = \Auth::user()->id;

        DB::table('playlist_follower')->insertGetId(
            ['playlist_id' => $id, 'user_id' => $userid]
        );

        $myplaylists = Playlist::where('user_id', '=', $userid)->orderBy('id', 'DESC')->paginate();
        $follow = DB::table('playlist_follower')
            ->select(
                'playlist_id'
            )
            ->where('user_id', '=', $userid)->get();
        //dd($follow);
        $x = '';
        $xArray = [];
        for ($i=0; $i < count($follow); $i++) { 
            $x .= $follow[$i]->playlist_id.',';
            $xArray[] = $follow[$i]->playlist_id;
        }
        $x = substr($x, 0, -1);
        //dd($xArray);


        $playlists = Playlist::where('id', 'not in', $follow)->orderBy('id', 'DESC')->paginate();

        $playlistsFollow = Playlist::whereIn('id',$xArray)->get();
        $playlistsUnfollow = Playlist::whereNotIn('id',$xArray)->where('user_id', '!=', $userid)->get();
        //dd($playlistsUnfollow);

        return redirect()->route('admin.playlists.index')
            ->with('myplaylists', $myplaylists)
            ->with('playlistsFollow', $playlistsFollow)
            ->with('playlistsUnfollow', $playlistsUnfollow);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unfollow($id)
    {
        $userid = \Auth::user()->id;

        DB::table('playlist_follower')->insertGetId(
            ['playlist_id' => $id, 'user_id' => $userid]
        );
        DB::table('playlist_follower')->where('playlist_id','=',$id)->where('user_id','=',$userid)->delete();

        $myplaylists = Playlist::where('user_id', '=', $userid)->orderBy('id', 'DESC')->paginate();
        $follow = DB::table('playlist_follower')
            ->select(
                'playlist_id'
            )
            ->where('user_id', '=', $userid)->get();
        //dd($follow);
        $x = '';
        $xArray = [];
        for ($i=0; $i < count($follow); $i++) { 
            $x .= $follow[$i]->playlist_id.',';
            $xArray[] = $follow[$i]->playlist_id;
        }
        $x = substr($x, 0, -1);
        //dd($xArray);


        $playlists = Playlist::where('id', 'not in', $follow)->orderBy('id', 'DESC')->paginate();

        $playlistsFollow = Playlist::whereIn('id',$xArray)->get();
        $playlistsUnfollow = Playlist::whereNotIn('id',$xArray)->where('user_id', '!=', $userid)->get();
        //dd($playlistsUnfollow);

        return redirect()->route('admin.playlists.index')
            ->with('myplaylists', $myplaylists)
            ->with('playlistsFollow', $playlistsFollow)
            ->with('playlistsUnfollow', $playlistsUnfollow);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
