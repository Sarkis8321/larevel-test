<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::all();
        return view('about', compact('news'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image'
        ]);
        
        $image = $request->file('image');
        if ($image) {
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        } else {
            $imageName = 'default.jpg';
        }
        
        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;
        $news->image = $imageName;
        $news->user_id = auth()->user()->id;
        $news->save();
        return redirect()->route('about');
    }
}
