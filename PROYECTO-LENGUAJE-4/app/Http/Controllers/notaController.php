<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nota;
use Illuminate\Support\Facades\DB;
class notaController extends Controller
{

    public function index(Request $request){
        $textoBuscar=$request->get('buscarDato');
        $notas_cont=DB::table('notas')
                    ->select('id','texto','fecha','contacto_id')
                    ->where('texto', 'LIKE', '%'.$textoBuscar.'%')
                    ->orwhere('fecha', 'LIKE', '%'.$textoBuscar.'%')
                    ->paginate(15);
        return view ('principalNotas', compact('notas_cont','textoBuscar'));

        $notas_cont = contacto::paginate(15);
        return view('principalNotas', compact('notas_cont'));
    }

        //--------------------CREATE-------------------------------
    public function create(){
        return view('crearNota');
    }
    public function show($id){
        $nota = nota::findOrFail($id);
        return view ('verNota',compact('nota'));
    }
     //--------------------CREATE-------------------------------

     public function store(Request $request ){
        $request->validate([
            'textoN'=>'required',
            'fechaN'=>'required|date',
            'contacto_id'=>'required|numeric',
          
        ]);
        $nuevaNota = new nota();
      
        $nuevaNota->texto = $request->input('textoN');
        $nuevaNota->fecha = $request->input('fechaN');
        $nuevaNota->contacto_id = $request->input('contacto_id');

        $CreadaNota = $nuevaNota->save();

        if($CreadaNota){
            return redirect()->route('nota.index')->with('mensaje', '¡¡¡¡¡Se Creo Con exito La Nota!!!!!');
        }else{
           return back();
        }
        }
        public function update(Request $request, $id){

                    $request->validate([
                        'nombreE'=>'required',
                        'fechaE'=>'required|date',
                        'contacto_id'=>'required|numeric',
                      
    
                    ]);
        
            $actualizarNota = nota::findOrFail($id);
        
               
        $actualizarNota->texto = $request->input('nombreE');
        $actualizarNota->fecha = $request->input('fechaE');
        $actualizarNota->contacto_id = $request->input('contacto_id');

            $actualizadaNota = $actualizarNota->save();
        
            if($actualizadaNota){
               return redirect()->route('nota.index')
               ->with('mensaje', 'La Nota fue modificada Exitosamente.');
             }else{
              return back();
           }
        
        
        }
        public function edit($id){
            $notaE = nota::findOrFail($id);
            return view ('editarNota', compact('notaE'));
        }
        public function destroy($id){
            nota::destroy($id);
        
            return redirect('/nota')->with('mensaje', 'Nota Se Elimino');
        }
        

     }

