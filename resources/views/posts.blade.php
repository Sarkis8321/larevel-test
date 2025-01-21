<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Заявки
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h2>Список постов</h2>
                
                <table border>
                    <thead>
                        <tr>
                            <td>Пользователь</td>
                            <td>Email</td>
                            <td>Название</td>
                            <td>Описание</td>
                            <td>Дата добавления</td>
                            <td>Статус</td>
                        </tr>
                    </thead>
                    <tbody>
                @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->user_name }}</td>
                            <td>{{ $post->user_email }}</td>
                            <td>{{ $post->name }}</td>
                            <td>{{ $post->description }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                        <form action="/edit-posts-status" method="POST">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <select name="status_id">
                                @foreach ($statuses as $st)
                                    @if ($post->status == $st->id)
                                    <option value="{{ $st->id }}" selected="selected">{{ $st->name }}</option>
                                    @else 
                                    <option value="{{ $st->id }}">{{ $st->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <button>Подтвердить</button>
                        </form>
                            </td>

                        </tr> 
                @endforeach

                     
                </tbody>
            </table>
            </div>
        </div>  
    </div>



</x-app-layout>