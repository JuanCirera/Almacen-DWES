<x-app-layout>
    <div class="py-12">
        <h4 class="text-center text-xl mb-4">Formulario de contacto</h4>
        <div class="mx-auto w-full max-w-lg">
            <form action="{{ route('send') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">
                        Nombre
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" name="nombre" value="{{ old('nombre') }}">
                    @error('nombre')
                        <p class="mt-2 text-red-600">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="contenido">
                        Contenido
                    </label>
                    <textarea rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        name="contenido">{{ old('contenido') }}</textarea>
                    @error('contenido')
                        <p class="mt-2 text-red-600">{{$message}}</p>
                    @enderror
                </div>

                <div class="flex flex-row">
                    <a href="{{ route('dashboard') }}"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <i class="fa-solid fa-paper-plane"></i> Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
