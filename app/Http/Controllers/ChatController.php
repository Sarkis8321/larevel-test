<?php

namespace App\Http\Controllers;
use App\Jobs\ChatPodcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;

class ChatController extends Controller
{
    


    public function index()
    {
        $messages = Chat::all();

        return view('dashboard', [
            "messages" => $messages
        ]);
    }


    public function store(Request $request){

        
        $validated = $request->validate([
            'message' => 'required|min:2|max:200',
        ], [
            'message.required' => 'Введите текст',
            'message.min' => 'в тексте минимально 2 символа',
            'message.max' => 'в тексте максимально 200 символов'
        ]);

        $message = $request->message;

        $p = new Chat;
        $p->text = $message;
        $p->user_id = Auth::user()->id;
        $p->save();

        ChatPodcast::dispatch($p);
        
        event(new \App\Events\MessageSent($p));

        return Redirect::route('dashboard');
    }



}
