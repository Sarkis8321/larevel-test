<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    
    
    public function index()
    {

        $posts = Post::all();

        $prikol = 'я прикол';

        return view('posts', [
            "prikol" => $prikol,
            "prikol2" => 'text'
        ]);
    }

    public function postsUserShow(){

        $posts = Post::where('user_id', Auth::user()->id)->get();;

        return view('posts-user', ["posts" => $posts]);

    }

    public function addPost(Request $request){

        $name = $request-> name;
        $description = $request-> description;



        $p = new Post;

        $p->name = $name;
        $p->description = $description;
        $p->status = 1;
        $p->user_id = Auth::user()->id;
        $p->save();

        return Redirect::route('posts_user_show');
    }



}
