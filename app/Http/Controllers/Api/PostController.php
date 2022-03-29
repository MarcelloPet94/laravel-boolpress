<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Category;
use App\Tag;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
/*         return response()->json([
            "name"=>"marcello",
            "surname"=>"pettenuzzo",
        ]); */

        /* $posts = Post::all(); */
        $posts = Post::with("category","tags")->get(); 
        /* $posts = Post::where("category_id","!=",null)->get(); */
        return response()->json($posts);
    }

    public function show($slug){
        $posts = Post::where('slug', $slug)->with(["category", "tags"])->first();
        return response()->json($posts);
    }        
}

