<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-col justify-center">
                    <div class="flex items-center">
                        <img src="{{$user->avatar }}" alt="foto perfil" class=" h-12 rounded-full">
                        <a href="{{route("posts.create")}}" class="ml-3 rounded-full border border-gray-400 p-2 w-3/6 hover:bg-gray-100">Que estas pensando?</a>
                    </div>
                </div>
            </div>
            
            @foreach ($posts as $post)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2 ">
                <div class="p-6 text-gray-900 flex flex-col justify-center">
                    <div class="flex py-3">
                        <img src="{{ $post->user->avatar }}" alt="foto perfil" class=" h-12 rounded-full">
                        <div class="flex flex-col ml-2">
                            <b>{{ $post->user->name }} {{ $post->user->last_name }}</b>
                            <span>{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <div class="py-2">
                        <span>{{$post->content}}</span>
                    </div>
                    <div class="w-full flex justify-center">
                        @if ($post->image_path)
                            @php
                                $extension = pathinfo($post->image_path, PATHINFO_EXTENSION);
                            @endphp
    
                            @if (in_array($extension, ['mp4', 'webm', 'ogg'])) {{-- Verificar si la extensión es de video --}}
                                <video src="{{ $post->image_path }}" id="videoViualizate" class="mt-3 shadow-lg rounded-md w-auto h-screen" controls></video>
                            @else
                                <img src="{{ $post->image_path }}" alt="Descripción de la imagen" class="w-auto h-screen">
                            @endif
                        @endif
                    </div>


                    <div class="flex justify-between w- full py-5">
                        <div class="flex items-center">
                            <img class="h-5" src="data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 16 16'%3e%3cdefs%3e%3clinearGradient id='a' x1='50%25' x2='50%25' y1='0%25' y2='100%25'%3e%3cstop offset='0%25' stop-color='%2318AFFF'/%3e%3cstop offset='100%25' stop-color='%230062DF'/%3e%3c/linearGradient%3e%3cfilter id='c' width='118.8%25' height='118.8%25' x='-9.4%25' y='-9.4%25' filterUnits='objectBoundingBox'%3e%3cfeGaussianBlur in='SourceAlpha' result='shadowBlurInner1' stdDeviation='1'/%3e%3cfeOffset dy='-1' in='shadowBlurInner1' result='shadowOffsetInner1'/%3e%3cfeComposite in='shadowOffsetInner1' in2='SourceAlpha' k2='-1' k3='1' operator='arithmetic' result='shadowInnerInner1'/%3e%3cfeColorMatrix in='shadowInnerInner1' values='0 0 0 0 0 0 0 0 0 0.299356041 0 0 0 0 0.681187726 0 0 0 0.3495684 0'/%3e%3c/filter%3e%3cpath id='b' d='M8 0a8 8 0 00-8 8 8 8 0 1016 0 8 8 0 00-8-8z'/%3e%3c/defs%3e%3cg fill='none'%3e%3cuse fill='url(%23a)' xlink:href='%23b'/%3e%3cuse fill='black' filter='url(%23c)' xlink:href='%23b'/%3e%3cpath fill='white' d='M12.162 7.338c.176.123.338.245.338.674 0 .43-.229.604-.474.725a.73.73 0 01.089.546c-.077.344-.392.611-.672.69.121.194.159.385.015.62-.185.295-.346.407-1.058.407H7.5c-.988 0-1.5-.546-1.5-1V7.665c0-1.23 1.467-2.275 1.467-3.13L7.361 3.47c-.005-.065.008-.224.058-.27.08-.079.301-.2.635-.2.218 0 .363.041.534.123.581.277.732.978.732 1.542 0 .271-.414 1.083-.47 1.364 0 0 .867-.192 1.879-.199 1.061-.006 1.749.19 1.749.842 0 .261-.219.523-.316.666zM3.6 7h.8a.6.6 0 01.6.6v3.8a.6.6 0 01-.6.6h-.8a.6.6 0 01-.6-.6V7.6a.6.6 0 01.6-.6z'/%3e%3c/g%3e%3c/svg%3e" alt="img de like">
                            <img class="h-5" src="data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 16 16'%3e%3cdefs%3e%3clinearGradient id='a' x1='50%25' x2='50%25' y1='0%25' y2='100%25'%3e%3cstop offset='0%25' stop-color='%23FF6680'/%3e%3cstop offset='100%25' stop-color='%23E61739'/%3e%3c/linearGradient%3e%3cfilter id='c' width='118.8%25' height='118.8%25' x='-9.4%25' y='-9.4%25' filterUnits='objectBoundingBox'%3e%3cfeGaussianBlur in='SourceAlpha' result='shadowBlurInner1' stdDeviation='1'/%3e%3cfeOffset dy='-1' in='shadowBlurInner1' result='shadowOffsetInner1'/%3e%3cfeComposite in='shadowOffsetInner1' in2='SourceAlpha' k2='-1' k3='1' operator='arithmetic' result='shadowInnerInner1'/%3e%3cfeColorMatrix in='shadowInnerInner1' values='0 0 0 0 0.710144928 0 0 0 0 0 0 0 0 0 0.117780134 0 0 0 0.349786932 0'/%3e%3c/filter%3e%3cpath id='b' d='M8 0a8 8 0 100 16A8 8 0 008 0z'/%3e%3c/defs%3e%3cg fill='none'%3e%3cuse fill='url(%23a)' xlink:href='%23b'/%3e%3cuse fill='black' filter='url(%23c)' xlink:href='%23b'/%3e%3cpath fill='white' d='M10.473 4C8.275 4 8 5.824 8 5.824S7.726 4 5.528 4c-2.114 0-2.73 2.222-2.472 3.41C3.736 10.55 8 12.75 8 12.75s4.265-2.2 4.945-5.34c.257-1.188-.36-3.41-2.472-3.41'/%3e%3c/g%3e%3c/svg%3e" alt="icono de corazon">
                            <span class="ml-1  font-bold">40</span>
                        </div>
                        <div class="flex items-center">
                            <span class="mr-2">16</span>
                            <span class="">Comentarios</span>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <button>
                            <i class="fa-regular fa-thumbs-up"></i>
                            <span>Me Gusta</span>
                        </button>
                        <button>
                            <i class="fa-regular fa-message"></i>
                            <span>Comentario</span>
                        </button>
                        <button>
                            <i class="fa-brands fa-whatsapp"></i>
                            <span>Enviar</span>
                        </button>
                        <button>
                            <i class="fa-regular fa-share-from-square"></i>
                            <span>Compartir</span>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="mt-4">
                {{$posts -> links()}}
            </div>

            
        </div>    
            
    </div>
</x-app-layout>
