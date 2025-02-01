<div>
    <ul>
        @foreach ($messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
    <button wire:click="$emit('echo:chat,message.sent', 'New message!')">Отправить</button>
</div>

