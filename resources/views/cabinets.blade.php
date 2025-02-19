<x-app-layout>
    <style>
        .preloader {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 10px solid #ccc;
            border-top-color: #3498db;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            О компании
        </h2>
    </x-slot>
    <div>
        <h1>Кабинеты</h1>

        <form id="add-cabinet-form" action="{{ route('add-cabinet') }}" method="post">
            @csrf
            <input type="text" name="name" placeholder="Название кабинета">
            <input type="text" name="teacher" placeholder="Преподаватель">
            <button type="submit" id="store-cabinet">Добавить кабинет</button>
        </form>
        <div class="preloader"></div>
        <div id="cabinets-list">
            
        </div>

<script>
 const preloader = document.querySelector('.preloader');
 preloader.style.display = 'block';
    function getCabinets() { 
        fetch('{{ route('get-cabinets') }}')
        .then(response => response.json())
        .then(data => {
            preloader.style.display = 'none';
            const cabinetsList = document.querySelector('#cabinets-list');
            cabinetsList.innerHTML = data.cabinets.map(cabinet => `<div>${cabinet.name}-${cabinet.teacher}</div>`).join('');
        });
    }
    
    document.addEventListener("DOMContentLoaded", () => {
        getCabinets()
        const form = document.querySelector('#add-cabinet-form');
        const addCabinet = document.querySelector('#store-cabinet');
        addCabinet.addEventListener('click', (e) => {
            e.preventDefault();
            preloader.style.display = 'block';
           fetch(form.action, {
            method: form.method,
            body: new FormData(form),
            headers: {
                'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
            }
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message); 
            getCabinets()
            preloader.style.display = 'none';
        });
        });
  });
</script>


    </div>


</x-app-layout>