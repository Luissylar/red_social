<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Publicacion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">
                <div class="p-6 text-gray-900 flex flex-col justify-center items-center">
                    <form class="w-1/3">
                        <div class="flex items-center  w-full">
                            <img src="{{ asset('users/img/perfil.webp') }}" alt="foto perfil" class=" h-12 rounded-full">
                            <input id="postInput" class="ml-3 rounded-full border border-gray-400 p-2 w-full hover:bg-gray-100" placeholder="Que estas pensando, Luis?" onkeyup="checkInput('postInput', 'submitButton')">
                        </div>
                        <div class="flex justify-center mt-4 ">
                            <button type="button" class="bg-gray-100 w-full flex flex-col items-center py-10 rounded-md">
                                <i class="far fa-image text-6xl text-center"></i>
                                <span>Agregar Fotos/Videos</span>
                            </button>
                        </div>
                        <button id="submitButton" class="bg-gray-300 text-white w-full rounded-md mt-4 py-2 " disabled >Publicar</button>
                    </form>
                </div>
            </div> 
        </div>
    </div>
</x-app-layout>
