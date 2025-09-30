<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\evento;
use Illuminate\Support\Facades\DB;
class eventoController extends Controller
{

    public function index(Request $request){
        $textoBuscar=$request->get('buscarDato');
        $eventos_cont=DB::table('eventos')
                    ->select('id','titulo','descripcion', 'fecha_inicio', 'fecha_fin', 'contacto_id')
                    ->where('titulo', 'LIKE', '%'.$textoBuscar.'%')
                    ->orwhere('descripcion', 'LIKE', '%'.$textoBuscar.'%')
                    ->paginate(15);
        return view ('principalEvento', compact('eventos_cont','textoBuscar'));

        $eventos_cont = evento::paginate(20);
        return view('principalEvento', compact('eventos_cont'));
    }

   
    //--------------------CREATE-------------------------------
    public function create(){
        return view('crearEvento');
    }
    public function show($id){
        $evento = evento::findOrFail($id);
        return view('verEvento', compact('evento'));
    }
    //---------------------------CREAR Evento----------------------------------------------------------------------------------------


     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     **/
    public function store(Request $request){

        $request->validate([
            'tituloE'=>'required',
            'descripcionE'=>'required',
            'fecha_inicioE'=>'required|date',
            'fecha_finE'=>'required|date',
            'contacto_id'=>'required|numeric'
        ]);
       
    $nuevoEvento = new evento();


    $nuevoEvento->titulo =  $request->input('tituloE');
    $nuevoEvento->descripcion = $request->input('descripcionE');
    $nuevoEvento->fecha_inicio = $request->input('fecha_inicioE');
    $nuevoEvento->fecha_fin = $request->input('fecha_finE');
    $nuevoEvento->contacto_id = $request->input('contacto_id');

    $creadoEvento = $nuevoEvento->save();

    if($creadoEvento){
        return redirect()->route('evento.index')->with('mensaje', '¡¡¡¡¡Se Creo Con exito El Evento!!!!!');
    }else{
       return back();
    }
}

//-------------------------ACTUALIZAR------------------------------------------------------------------------------------------
public function update(Request $request, $id){

    
    $request->validate([
        'tituloE'=>'required',
        'descripcionE'=>'required',
        'fecha_inicioE'=>'required|date',
        'fecha_finE'=>'required|date',
        'contacto_id'=>'required|numeric'
    ]);
  
    $actualizarEvento = evento::findOrFail($id);

    $actualizarEvento->titulo =  $request->input('tituloE');
    $actualizarEvento->descripcion = $request->input('descripcionE');
    $actualizarEvento->fecha_inicio = $request->input('fecha_inicioE');
    $actualizarEvento->fecha_fin = $request->input('fecha_finE');
    $actualizarEvento->contacto_id = $request->input('contacto_id');


    $actualizadoEvento = $actualizarEvento->save();

    if($actualizadoEvento){
       return redirect()->route('evento.index')
       ->with('mensaje', 'El Evento se Actualizo con exito:');
     }else{
      return back();
   }
}
//-------------------------Editar------------------------------------------------------------------------------------------

public function edit($id){
    $eventoE = evento::findOrfail($id);
    return view('editarEvento',compact('eventoE'));
}
//-------------------------borrar------------------------------------------------------------------------------------------
public function destroy($id){
    evento::destroy($id);
    return redirect('/evento')->with('mensaje','El Evento Se Elimino');
}
}
