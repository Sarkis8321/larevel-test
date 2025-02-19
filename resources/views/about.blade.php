<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            О компании
        </h2>
    </x-slot>

    <!-- форма для добавления новости -->
    <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Название">
        <textarea name="content" placeholder="Контент"></textarea>
        <input type="file" name="image">
        <button type="submit">Добавить</button>
    </form>

    <!-- вывод новостей -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Новости</h1>
                @foreach ($news as $item)
                    <h2>{{ $item->title }}</h2>
                    <p>{{ $item->content }}</p>
                    <img width="100" src="{{ asset('images/' . $item->image) }}" alt="{{ $item->title }}">
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>