<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePost;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create','store');
        $this->middleware('can:admin.posts.edit')->only('edit','update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::pluck('name','id');
        $tags=Tag::all();
        return view('admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        Cache::flush();

        $slug=Str::slug($request->name);
        $user_id=auth()->user()->id;
        $post=Post::create([
            'name'=>$request->name,
            'slug'=>$slug,
            'extract'=>$request->extract,
            'body'=>$request->body,
            'status'=>$request->status,
            'category_id'=>$request->category_id,
            'user_id'=>$user_id,
        ]);

        if($request->file('file')){
            $url=Storage::put('public/posts',$request->file('file'));
            $post->image()->create([
                'url'=>$url
            ]);
        }

        if($request->tags){
            $post->tags()->attach($request->tags);
        }
        return redirect()->route('admin.posts.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {   
        $this->authorize('author',$post);

        $categories=Category::pluck('name','id');
        $tags=Tag::all();
        return view('admin.posts.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, Post $post)
    {
        Cache::flush();

        $slug=Str::slug($request->name);
        $post->update([
            'name'=>$request->name,
            'slug'=>$slug,
            'extract'=>$request->extract,
            'body'=>$request->body,
            'status'=>$request->status,
            'category_id'=>$request->category_id,
        ]);

        if($request->file('file')){
            $url=Storage::put('public/posts',$request->file('file'));

            if($post->image){
                Storage::delete($post->image->url);
                $post->image()->update([
                    'url'=>$url
                ]);
            }
            else{
                $post->image()->create([
                    'url'=>$url
                ]);
            }
        }
            if($request->tags){
                $post->tags()->sync($request->tags);
            }
            return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Cache::flush();

        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
