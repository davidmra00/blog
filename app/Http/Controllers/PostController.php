<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index(){
        if(request()->page){
            $key='post'.request()->page;
        }
        else{
            $key='posts';
        }

        if (Cache::has($key)) {
            $posts=Cache::get($key);
        } else {
            $posts=Post::where('status',2)->latest('id')->paginate(9);
            Cache::put($key,$posts);
        }
        return view('posts.index',compact('posts'));
    }

    public function show(Post $post){
        $this->authorize('published',$post);
        return view('posts.show',compact('post'));
    }

    public function category(Category $category){
        $posts=Post::where('category_id',$category->id)->where('status',2)->latest('id')->paginate(9);
        return view('posts.category',compact('posts','category'));
    }

    public function tag(Tag $tag){
        $posts=$tag->posts()->where('status',2)->latest('id')->paginate(9);
        return view('posts.tag',compact('posts','tag'));
    }
}
