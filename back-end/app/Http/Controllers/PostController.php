<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\User;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {

        $post = Post::select('post_image','post_title','post_description','firstName','lastName','user_id','posts.id')
        ->join('users','posts.user_id','users.id')->paginate(6);
        return view('User.index',['post'=>$post]);
    }
    public function showPhoto()
    {
        $post = Post::select('post_image','post_title','post_description','firstName','lastName','user_id','posts.id')
        ->join('users','posts.user_id','users.id')
        ->where('user_id',Auth::user()->id)
        ->orderBy('posts.id','desc')->paginate(6);
        return view('User.photo',['post'=>$post]);
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
        //dd(storage_path('app/public') . '/download.jpeg');
       //dd($request->all(), $request->file('file'));
        $post = new Post;
        $post->user_id = $request['user_id'];
        $post->post_title = $request['title'];
        $post->post_description = $request['description'];
        if($request->hasFile('file')){
            $file = $request->file('file');
            $img = 'avatar-' . time() . '.' . $file->getClientOriginalExtension();
            $path = storage_path('app/public') ;
            $file->move($path, $img);
            $post->addMedia(storage_path('app/public') . '/'.$img)->toMediaCollection('images');
        }
        $post->save();
        $media = $post->getMedia();
        // if($request->hasFile('image') && $request->file('image')->isValid()){
        //     $post->addMediaFromRequest('image')->toMediaCollection('images');
        // }
        return redirect('/photo');
    }
    // public function stordeMedia(Request $request){
    //     $path = storage_path('app/public');
    //     if(!file_exists($path)){
    //         mkdir($path,0777,true);
    //     }
    //     $file = $request->file('file');
    //     $name = uniquid().'_'.trim($file->getClientOriginalName());
    //     $file->move($path,$name);
    //     return response()->json([
    //         'name' => $name,
    //         'original_name' => $file->getClientOriginalName(),
    //     ]);
    // }

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
        $post = Post::select('posts.id','post_image','post_title','post_description','firstName','lastName')
        ->join('users','posts.user_id','users.id')
        ->where('posts.id','=',$id)->get();
        return view('User.editPhoto',['post'=>$post]);
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
        $post=Post::where('id',$request['id'])
        ->update(['post_title' => $request['title'],'post_description' => $request['description']]);
        return redirect('/photo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where('id',$id)->delete();
        return redirect('/photo');
    }
}
