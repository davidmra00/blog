<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Image;

class Post extends Model
{
    use HasFactory;

    protected $guarded=['id','created_at','updated_at'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //relacion uno a muchos inversa con user
    public function user(){
        return $this->belongsTo(User::class);
    }

    //relacion uno a muchos inversa con category
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //relacion muchos a muchos con tags
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    //relacion uno a uno polimorfica con images
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
}
