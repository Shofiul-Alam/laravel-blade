<?php

namespace App\Http\Controllers;

use App\Post;
use App\Photo;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostsCreateRequest;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name', 'id')->all();
      
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        //
       $user = Auth::user();

       $input = $request->all();

      

       if(isset($request->file)) {
     
        $photo['filename'] = $request->file->store('');
        $photo['file'] = $photo['filename'];
        $photo['name'] = $photo['filename'];

        $dbPhoto = Photo::create($photo);

        $input['photo_id'] = $dbPhoto->id;
       }
    //    $input['user_id'] = $user->id;
    //    Post::create($input);

    $user->posts()->create($input);


       return redirect('admin/posts');

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
        $categories = Category::pluck('name', 'id')->all();
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post', 'categories'));
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
        $post = Post::findOrFail($id);

        $input = $request->all();

        if(isset($request->file)){

            if($post->photo) {
                $post->photo()->delete();
                Storage::delete($post->photo->name);

            }
            $photo['filename'] = $request->file->store('');
            $photo['file'] = $photo['filename'];
            $photo['name'] = $photo['filename'];

            $dbPhoto = Photo::create($photo);

            $input['photo_id'] = $dbPhoto->id;
        }

       

        $post->update($input);

        return redirect('/admin/posts');
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
         $post = Post::findOrFail($id);

         if($post->photo) {
             Photo::findOrFail($post->photo->id)->delete();
 
             Storage::delete($post->photo->name);
         }
 
         $post->delete();
 
         Session::flash('deleted_post', 'The post has been deleted');
 
         
         
 
         return redirect('admin/posts');
    }
}
