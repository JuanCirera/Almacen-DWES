<x-app-layout>
    <div class="py-12">
        <h4 class="text-center text-xl mb-4">Editar artículo</h4>
        <div class="mx-auto w-full max-w-lg">
            <form action="{{ route('articles.update',$article) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">
                        Nombre
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" name="nombre" value="{{ old('nombre',$article->nombre) }}">
                    @error('nombre')
                        <p class="mt-2 text-red-600">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="precio">
                        Precio
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="number" step=".01" name="precio" value="{{ old('precio',$article->precio) }}">
                    @error('precio')
                        <p class="mt-2 text-red-600">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="stock">
                        Stock
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="number" name="stock" value="{{ old('stock',$article->stock) }}">
                    @error('stock')
                        <p class="mt-2 text-red-600">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="descripcion">
                        Descripción
                    </label>
                    <textarea rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        name="descripcion">{{ old('descripcion',$article->descripcion) }}</textarea>
                    @error('descripcion')
                        <p class="mt-2 text-red-600">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="precio">
                        Imagen
                    </label>
                    <input name="file"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded cursor-pointer bg-gray-50 focus:outline-none"
                        id="file" type="file">
                    @error('file')
                        <p class="mt-2 text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <img src="{{ Storage::url($article->imagen) }}" alt="" class="rounded-lg" id="imagen">
                </div>

                <div class="flex flex-row">
                    <a href="{{ route('dashboard') }}"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <i class="fas fa-edit"></i> Editar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
