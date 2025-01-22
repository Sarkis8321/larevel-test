<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Post;
use App\Models\User;
use App\Models\Satuses;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    
    
    public function index()
    {
        $posts = Post::all();
        $users = User::all();
        $statuses = Satuses::all();

        foreach ($posts as $key => $value){
            $item = null;
            foreach($users as $user) {
                if ($user["id"] == $value["user_id"]) {
                    $item = $user;
                    break;
                }
            }
            $status = null;
            foreach($statuses as $st) {
                if ($st["id"] == $value["status"]) {
                    $status = $st;
                    break;
                }
            }

            $value["user_name"] = $item["name"];
            $value["user_email"] = $item["email"];

            $value["status_name"] = $status["name"];
        }


        return view('posts', [
            "posts" => $posts,
            "statuses" => $statuses
        ]);
    }

    public function postsUserShow(){

        $posts = Post::where('user_id', Auth::user()->id)->get();
        $statuses = Satuses::all();

        foreach ($posts as $key => $value){
            
            $status = null;
            foreach($statuses as $st) {
                if ($st["id"] == $value["status"]) {
                    $status = $st;
                    break;
                }
            }

            $value["status_name"] = $status["name"];
        }





        return view('posts-user', ["posts" => $posts]);

    }

    public function addPost(Request $request){

        $name = $request->name;
        $description = $request-> description;
        $p = new Post;
        $p->name = $name;
        $p->description = $description;
        $p->status = 1;
        $p->user_id = Auth::user()->id;
        $p->save();

        return Redirect::route('posts_user_show');
    }


    public function editPostStatus(Request $request) {
        $post_id = $request->post_id;
        $status_id = $request->status_id;
        $p = Post::where('id', $post_id)->first();
        $p->status = $status_id;
        $p->save();
        return Redirect::route('posts');
    }



}
