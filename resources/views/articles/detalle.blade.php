<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mx-auto max-w-lg rounded overflow-hidden shadow-lg mb-5 bg-white">
                <img class="w-full" src="{{Storage::url($article->imagen)}}" alt="">
                <div class="px-6 py-4">
                    <div>
                        {{$article->nombre}}
                    </div>
                    <p>
                        <b>Stock:</b> {{$article->stock}} unidades
                    </p>
                    <p>
                        <b>Proveedor:</b> {{$article->user->email}} 
                    </p>
                    <p>
                        <b>Descripcion:</b> <br> {{$article->descripcion}}
                    </p>
                    <p>
                        <b>PVP:</b> {{$article->precio}}€ 
                    </p>
                    <div class="mt-5">
                        <a href="{{route("dashboard")}}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded">
                            <i class="fa-solid fa-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>