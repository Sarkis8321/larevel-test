<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Заявки пользователя
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h2>Добавить заявку</h2>
                <form action="/add-post" method="POST" class="max-w-sm mx-auto">
                    @csrf
                <div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="text" name="name" required placeholder="название заявки" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2">
                    <textarea name="description" required id="" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2"></textarea>
                </div> 
                    <button type="submit" class="text-blue block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2">Добавить</button>
                </form>

                <table border>
                    <thead>
                        <tr>
                            <td>Название</td>
                            <td>Описание</td>
                            <td>Статус</td>
                            <td>Дата добавления</td>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->name }}</td>
                            <td>{{ $post->description }}</td>
                            <td>{{ $post->status_name }}</td>
                            <td>{{ $post->created_at }}</td>
                        </tr> 
                    @endforeach

                       
                    </tbody>
                </table>
            </div>
        </div>  
    </div>



</x-app-layout>