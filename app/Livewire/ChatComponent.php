<?php

namespace App\Livewire;

use Livewire\Component;

class ChatComponent extends Component
{
    public $messages = [];
    protected $listeners = ['echo:chat,message.sent' => 'addMessage'];

    public function addMessage($message)
    {
        $this->messages[] = $message;
    }

    public function render()
    {
        return view('livewire.chat-component');
    }
    
}
