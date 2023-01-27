<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h4 class="text-center text-xl mb-4">Artículos</h4>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if ($articles->count())
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Info
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Precio
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Stock
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $article)
                                    <tr class="bg-white border-b">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            <a href="{{route('articles.show',$article)}}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded">
                                                <i class="fas fa-info"></i>
                                            </a> 
                                        </th>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{$article->nombre}}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{$article->precio}}€
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$article->stock}}
                                        </td>
                                        <td class="px-6 py-4">
                                            <form action="{{route('articles.destroy',$article)}}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <a href="{{route('articles.edit',$article)}}" class="bg-gray-400 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded mr-2">
                                                    <i class="fas fa-edit"></i> 
                                                </a> 
                                                <button type="submit" class="bg-gray-400 hover:bg-red-400 text-white font-bold py-2 px-4 rounded">
                                                    <i class="fas fa-trash"></i> 
                                                </button>
                                            </form>
                                        </td>
                                    </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <h4>
                            Parece que todavía no tienes ningún artículo, empieza creando uno desde este botón <br><i class="fas fa-arrow-down text-xl"></i>
                        </h4>
                        <div class="mt-5">
                            <a href="{{route('articles.create')}}" class="bg-gray-400 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded">
                                <i class="fas fa-add"></i> Nuevo
                            </a>
                        </div>
                    </div>
                @endif
                
            </div>
            <div class="mt-4 mb-2">
                {{$articles->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
