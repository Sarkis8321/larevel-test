<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    
    
    public function index()
    {

        $prikol = 'я прикол';

        return view('posts', [
            "prikol" => $prikol,
            "prikol2" => 'text'
        ]);
    }

    public function postsUserShow(){

        return view('posts-user');

    }



}
