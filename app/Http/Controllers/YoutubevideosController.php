<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Youtubevideo;
use Laracasts\Flash\Flash;

class YoutubevideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //dd($id);
        $youtubevideos = Youtubevideo::where('playlist_id', $id)->orderBy('id', 'DESC')->paginate(5);
        return view('admin.youtubevideos.index')
            ->with('youtubevideos', $youtubevideos)
            ->with('id_playlist', $id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //dd($id);
        return view('admin.youtubevideos.create')->with('id_playlist', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $youtubevideo = new Youtubevideo($request->all());
        $youtubevideourl = $request->video_url;
        $youtubevideourl = explode("v=", $youtubevideourl);
        $youtubevideo->video_url = $youtubevideourl[1];
        //dd($request->video_url);
        $youtubevideo->save();

        Flash::success("The video <b>" . $youtubevideo->title . "</b> has been saved successfully!");
        //return redirect()->route('admin.youtubevideos.index');
        return redirect()->route('admin.youtubevideos.index', ['id' => $youtubevideo->playlist_id]);
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
    public function edit($id)
    {
        //
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
