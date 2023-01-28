<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Practica tienda</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

    </head>
    <body class="antialiased">
        <h2 class="text-center font-bold text-2xl bg-gray-100 py-4">La tienda de Laravel</h2>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            
            <div class="flex flex-wrap content-around py-10" style="width: 80%;">
                @foreach ($articulos as $articulo)
                    @if (!Auth::check() && ($articulo->stock)>0)
                        <div class="mx-auto max-w-sm rounded overflow-hidden shadow-lg mb-5 bg-white">
                            <img class="w-full" src="{{Storage::url($articulo->imagen)}}" alt="">
                            <div class="px-6 py-4">
                                <div class="text-base">
                                    {{$articulo->nombre}}
                                </div>
                                <p class="text-base">
                                    Prov: {{$articulo->user->email}} 
                                </p>
                                <p class="font-black text-gray-900 text-xl mt-4">
                                    {{$articulo->precio}}€ 
                                </p>
                            </div>
                        </div>
                    @else
                        <div class="mx-auto max-w-sm rounded overflow-hidden shadow-lg mb-5 bg-white">
                            <img class="w-full" src="{{Storage::url($articulo->imagen)}}" alt="">
                            <div class="px-6 py-4">
                                <div class="text-base">
                                    {{$articulo->nombre}}
                                </div>
                                <p class="text-base">
                                    Prov: {{$articulo->user->email}} 
                                </p>
                                <p class="font-black text-orange-400 text-xl mt-4">
                                    {{$articulo->precio}}€ 
                                </p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            
        </div>
        <div class="px-2 py-5 bg-gray-100">
            {{$articulos->links()}}
            {{-- Paginacion --}}
        </div>
    </body>
</html>
