<?php

namespace App\Http\Controllers;
use  App\Models\Directorio;
use  App\Models\Contacto;
use Illuminate\Http\Request;

class DirectorioController extends Controller
{
    //

    public function index(){
        $directorios=Directorio::all();
        return view("directorio",compact("directorios"));
    }
    
    public function crear(){
        return view("crearEntrada");
    }

    public function buscar(){
        return view("buscar");
    }

    public function obtener(Request $request){
        
        $correo = $request->input('correo');
        $directorio = Directorio::where('correo', $correo)->first();
    
        if ($directorio) {
            $contactos = Contacto::where('codigoEntrada', $directorio->codigoEntrada)->get();
            return view('vercontactos', compact('directorio', 'contactos'));
        } else {
            return redirect()->route('directorio.index');
        }
    
    }

    public function eliminar($codigoEntrada){
        $directorio=Directorio::find($codigoEntrada);
        return view("eliminar", compact("directorio"));
        
    }

    public function destroy($codigoEntrada){
        $directorio=Directorio::find($codigoEntrada);
        $contactos=Contacto::where("codigoEntrada", $codigoEntrada)->get();

        foreach( $contactos as $contacto){
            $contacto->delete();
        }

        $directorio->delete();

        return redirect()->route('directorio.index');
        
    }

    public function guardar(Request $request){
        $directorio= new Directorio();  
        $directorio->codigoEntrada = $request->input('codigo');
        $directorio->nombre= $request->input('nombre');
        $directorio->apellido= $request->input('apellido');
        $directorio->correo= $request->input('correo');
        $directorio->telefono = $request->input('telefono');
        $directorio->save();

        return redirect()->route('directorio.index');
    }

}