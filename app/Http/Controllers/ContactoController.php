<?php

namespace App\Http\Controllers;

use App\Mail\Contacto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactoController extends Controller{

    public function index(){
        return view("correos.contacto");
    }

    public function send(Request $request){
        $request->validate([
            "nombre"=>["required","string","min:3"],
            "contenido"=>["required","string","min:10"]
        ]);

        try{
            Mail::to("tienda@practica.es")->send(new Contacto($request->all()));
            return redirect()->route("dashboard")->with("mensaje","Mensaje enviado");
        }catch(Exception $e){
            return redirect()->route("dashboard")->with("mensaje","Error al enviar, inténtelo más tarde");
        }
    }

}