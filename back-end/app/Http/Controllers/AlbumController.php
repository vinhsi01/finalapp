<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Album;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $album = Album::select('album_title','album_description','firstName','lastName','user_id','albums.id')
        ->join('users','albums.user_id','users.id')->paginate(6);
        return view('User.album',['album'=>$album]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $album = new Album;
        $album->user_id = $request['user_id'];
        $album->album_title = $request['title'];
        $album->album_description = $request['description'];
        if($request->hasFile('file')){
            $file = $request->file('file');
            // dd($file);
            foreach ($file as $key => $item){
                // dd($item);
                $img = 'hinh-' . $key . '.' . $item->getClientOriginalExtension();
                //dd($img);
                $path = storage_path('app/public/');
                //dd($path);
                $store = $item->move($path, $img);
              //  dd($store,$path);
                // dd($post->addMedia($store)->toMediaCollection('images')) ;
                // $post->addMedia(storage_path('app/public/').$img)->toMediaCollection('images');
                $album->addMedia($store)->toMediaCollection('imagesAlbum');
            }
        }
        $album->save();
       return redirect('album');
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
        $album = Album::find($id);
        $mediaItems = $album->getMedia('imagesAlbum');
        // $mediaAlbum = DB::table('media')->where('id','=',79)->get();
        // dd($mediaAlbum);
        $idMedia = DB::table('media')->select('id')->get();
        // foreach($mediaItems as $media){
        //     $media->id;
        // }
        // $idMedia = $mediaItems[1]->id;
        // // //$url = $mediaItems[0]->getUrl();
        // dd($idMedia);
        $album = Album::select('albums.id','album_image','album_title','album_description','firstName','lastName')
        ->join('users','albums.user_id','users.id')
        ->where('albums.id','=',$id)->get();
        return view('User.editAlbum',['album'=>$album,'media'=>$mediaItems]);
    }
    public function deleteMedia($id,$idAlbum){
        $mediaAlbum = DB::table('media')->where('id','=',$id)->delete();
        return redirect('/editAlbum'.'/'.$idAlbum);
        // dd($mediaAlbum);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->hasFile('file')){
            $album = Album::find($request['id']);
            $file = $request->file('file');
            foreach ($file as $key => $item){   
                $img = 'hinh-' . $key . '.' . $item->getClientOriginalExtension();
                $path = storage_path('app/public/');
                $store = $item->move($path, $img);
                $album->addMedia($store)->toMediaCollection('imagesAlbum');
            }
        }
        $album=Album::where('id',$request['id'])
        ->update(['album_title' => $request['title'],'album_description' => $request['description']]);
        return redirect('/album');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::where('id',$id)->delete();
        return redirect('/album');
    }
}
