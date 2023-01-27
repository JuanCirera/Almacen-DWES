<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("articles.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nombre"=>["required","string","unique:nombre"],
            "descripcion"=>["required","string"],
            "file"=>["required","image"],
            "precio"=>["required","decimal:5,2","max:999"],
            "stock"=>["required","number"]
        ]);

        //Se guarda la imagen
        $img=$request->file->store("articulos");

        //Se crea el objeto
        Article::create([
            "nombre"=>$request->nombre,
            "descripcion"=>$request->descripcion,
            "imagen"=>$img,
            "precio"=>$request->precio,
            "stock"=>$request->stock,
            "slug"=>Str::slug($request->nombre),
            "user_id"=>auth()->user()->id
        ]);


        return redirect()->route("dashboard")->with("mansaje","Artículo creado");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view("articles.detalle",compact("article"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view("articles.edit",compact("article"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            //Se le añade el id del objeto para que lo excluya en la comprobacion
            "nombre"=>["required","string","unique:articles,nombre".$article->id],
            "descripcion"=>["required","string"],
            "file"=>["required","image"],
            "precio"=>["required","decimal:5,2","max:999"],
            "stock"=>["required","number"]
        ]);

        //Se guarda o no la imagen en caso de haberse cambiado
        $img=($request->file) ? $request->file->store("articulos") : $article->imagen;
        $oldImg=$article->imagen;

        //Se actualiza el objeto
        $article->update([
            "nombre"=>$request->nombre,
            "descripcion"=>$request->descripcion,
            "imagen"=>$img,
            "precio"=>$request->precio,
            "stock"=>$request->stock,
            "slug"=>Str::slug($request->nombre),
            "user_id"=>auth()->user()->id
        ]);

        //Se borra la imagen anterior si es que hay una nueva
        if($request->file) Storage::delete($oldImg);

        return redirect()->route("dashboard")->with("mansaje","Artículo actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $img=$article->imagen;

        $article->delete();
        Storage::delete($img);

        return redirect()->route("dashboard")->with("mansaje","Artículo eliminado");
    }
}
