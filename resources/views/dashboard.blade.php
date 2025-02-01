<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Главная страница
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <div class="chat">
                @livewire('chat-component')

                    <div class="messages">
                    @foreach ($messages as $m)
                        <div class="message">
                            {{ $m->text }}
                        </div>
                    @endforeach
                    </div>
                    <form action="/add-message" method="post">
                        @csrf
                        <input type="text" name="message" placeholder="введите сообщение">
                        <button>Отправить</button>
                    </form>
                </div>




            </div>
        </div>  
    </div>
</x-app-layout>
