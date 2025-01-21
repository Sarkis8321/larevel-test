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
                            <td>Статус</td>
                            <td>Дата добавления</td>
                        </tr>
                    </thead>
                    <tbody>
                @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->user_name }}</td>
                            <td>{{ $post->user_email }}</td>
                            <td>{{ $post->name }}</td>
                            <td>{{ $post->description }}</td>
                            <td>{{ $post->status }}</td>
                            <td>{{ $post->created_at }}</td>
                        </tr> 
                @endforeach

                     
                </tbody>
            </table>
            </div>
        </div>  
    </div>



</x-app-layout>