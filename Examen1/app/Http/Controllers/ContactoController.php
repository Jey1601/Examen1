<?php

namespace App\Http\Controllers;

use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Http\Request;
use App\Models\Contacto;
use App\Models\Directorio;
class ContactoController extends Controller
{
    //
    public function obtenerContactos($codigoEntrada){
        $contactos=Contacto::where('codigoEntrada',$codigoEntrada)->get();
        $directorio=Directorio::find($codigoEntrada);

        return view('vercontactos', compact('contactos','directorio'));    
        
    }

    public function agregar($codigoEntrada){
        return view('agregarContacto', compact('codigoEntrada'));    
        
    }

    public function guardar(Request $request){
        $contacto= new Contacto();
        $contacto->codigoEntrada=$request->input('codigo');
        $contacto->nombre= $request->input('nombre');
        $contacto->apellido= $request->input('apellido');
        $contacto->telefono = $request->input('telefono');
        $contacto->save();

        return redirect()->route('contacto.obtenerContactos',$request->input('codigo'));
        
    }

    public function eliminar($id){
        $contacto=Contacto::find($id);
        $contacto->delete();

        return redirect()->route('directorio.index');
        
    }
    


}
