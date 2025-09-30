<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contacto;
use Illuminate\Support\Facades\DB;


class contactoController extends Controller
{
    public function index(Request $request){
        $textoBuscar=$request->get('buscarDato');
        $contactos_cont=DB::table('contactos')
                    ->select('id','nombre','apellido', 'correo_electronico', 'telefono')
                    ->where('nombre', 'LIKE', '%'.$textoBuscar.'%')
                    ->orwhere('apellido', 'LIKE', '%'.$textoBuscar.'%')
                    ->orwhere('correo_electronico', 'LIKE', '%'.$textoBuscar.
                    '%')
                    ->orwhere('telefono', 'LIKE', '%'.$textoBuscar.'%')
                    ->paginate(10);
        return view ('principalContacto', compact('contactos_cont','textoBuscar'));

        $contactos_cont =contacto::paginate(20);
        return view ('principalContacto', compact('contactos_cont'));

    }


   
    public function create(){
        return view('crearContacto');
    }
    public function show($id){
        //findOrFail buscar mediante ID sin necesidad de comprobar si existe
        $contacto = contacto::findOrFail($id);
        return view('verContacto', compact('contacto'));
    }
    //---------------------------CREAR CONTACTO----------------------------------------------------------------------------------------


     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     **/
    public function store(Request $request){

        $request->validate([
            'nombreC'=>'required',
            'apellidoC'=>'required',
            'correoC'=>'required|email',
            'telefonoC'=>'required'
          
        ]);
    
    
    $nuevoContacto = new contacto();


    $nuevoContacto->nombre =  $request->input('nombreC');
    $nuevoContacto->apellido = $request->input('apellidoC');
    $nuevoContacto->correo_electronico = $request->input('correoC');
    $nuevoContacto->telefono = $request->input('telefonoC');

    $creado = $nuevoContacto->save();

    if($creado){
        return redirect()->route('contacto.index')->with('mensaje', '¡¡¡¡¡Se Creo Con exito El Contacto!!!!!');
    }else{
       return back();
    }
}

//-------------------------------------------------------------------------------------------------------------------

public function update(Request $request, $id){

   
        $request->validate([
            'nombreC'=>'required',
            'apellidoC'=>'required',
            'correoC'=>'required|email',
            'telefonoC'=>'required'
          
    
    ]);

    $actualizarContacto = contacto::findOrFail($id);

    $actualizarContacto->nombre =  $request->input('nombreC');
    $actualizarContacto->apellido = $request->input('apellidoC');
    $actualizarContacto->correo_electronico = $request->input('correoC');
    $actualizarContacto->telefono = $request->input('telefonoC');

    $creadoC = $actualizarContacto->save();

    if($creadoC){
       return redirect()->route('contacto.index')
       ->with('mensaje', 'El contacto se Actualizo con exito:.');
     }else{
      return back();
   }


}
public function edit($id){
    $contactoE = contacto::findOrFail($id);
    return view ('editarContacto', compact('contactoE'));
}
public function destroy($id){
    contacto::destroy($id);

    return redirect('/contacto')->with('mensaje', 'Contacto Se Elimino');
}

}
