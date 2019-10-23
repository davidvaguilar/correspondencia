<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documento;
use App\Expediente;
use App\Archivo;
use App\Usuario;

class DocumentoController extends Controller
{
    public function __construct(){
        $this->disponibilidad();  //desocupar documento
    }

    public function index()
    {        
        $documentos = Documento::orderBy('fecha_registro', 'desc')->paginate(10);
        return view('documento.index', compact('documentos'));
    }

    public function create()
    {
        return view('documento.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'fecha_registro' => 'required|date',
            'tipo' => 'required',
            'numero' => 'required',  //numeric|min:0
            'envia' => 'required|min:3',
            'recibe' => 'nullable|min:3',
            'materia' => 'nullable|min:3',
            'destino' => 'nullable|min:3',
            'fecha_destino' => 'nullable|date',
            'respuesta' => 'nullable|min:3',
            'fecha_respuesta' => 'nullable|date',
        ];
        $this->validate($request, $rules);
        
        $expediente = new Expediente();
                $expediente->usuario_id = 1;
        $expediente->save();
        $documento = new Documento();
        $documento->fecha_registro = $request->input('fecha_registro');
        $documento->tipo = $request->input('tipo');
        $documento->numero = $request->input('numero');
        $documento->envia = $request->input('envia');
        $documento->recibe = $request->input('recibe');
        $documento->materia = $request->input('materia');
        $documento->destino = $request->input('destino');
        $documento->fecha_destino = $request->input('fecha_destino');
        $documento->respuesta = $request->input('respuesta');
        $documento->fecha_respuesta = $request->input('fecha_respuesta');
        $documento->expediente_id = $expediente->id;
        $documento->usuario_id = $expediente->usuario_id;
        $documento->save();

        $notificacion = "El documento fue registrado exitosamente.";
        return redirect('documentos')->with('notificacion');
    }

    public function show($id)
    {
        $usuarios = Usuario::all();
        $documento = Documento::find($id);
        $archivos = $documento->archivos()->get();
        //dd($archivos);
        return view('documento.show')->with(compact('documento', 'archivos', 'usuarios'));  //formulario de registro
    }

    public function edit($id)
    {
        $documento = Documento::findOrFail($id);   //OrFail  'id','=', ->first()  //dd($documento );        
        if( $documento->estado == 'disponible' ){
            $usuarios = Usuario::all();
           
            $usuario_ids = $documento->recibidos()->pluck('usuario_id');
          
//dd($usuario_ids);
            $expediente = Expediente::findOrFail($documento->expediente_id);  //OrFail  'id','=',  ->get() //dd($expediente->id);
            $usuario_id = 1;
            $documento->estado = 'ocupado';
            $documento->usuario_estado = $usuario_id;
            $documento->save();
//dd($usuarios);
            $notificacion = "El documento esta siendo ocupado por otro usuario.";
            return view('documento.edit')->with(compact('expediente','documento', 'usuarios', 'usuario_ids')); 
        }
        $notificacion = "El documento esta siendo ocupado por otro usuario.";
        return back()->with(compact('notificacion'));
        //return view('documento.show')->with(compact('documento', 'notificacion'));
    }

    public function update(Request $request, $id)
    {

        if( $request->file('archivo') ){
            $archivo_elemento = $request->file('archivo');  //file -> archivo
            $archivo_nombre = $archivo_elemento->getClientOriginalName(); // fileName -> archivo_nombre
            $path = public_path().'/files';
            $archivo_enlace = uniqid().$archivo_nombre;   
            $movido = $archivo_elemento->move($path, $archivo_enlace);
    
            if ($movido) {
                $archivo = new Archivo();
                $archivo->nombre = $archivo_nombre;
                $archivo->enlace = $archivo_enlace;
                $archivo->documento_id = $id;
                $archivo->save();
            }
        }

        $documento = Documento::findOrFail($id);
        $documento->fecha_registro = $request->input('fecha_registro');
        $documento->tipo = $request->input('tipo');
        $documento->numero = $request->input('numero');
        $documento->envia = $request->input('envia');
        //$documento->recibe = $request->input('recibe');
        $documento->materia = $request->input('materia');
        $documento->destino = $request->input('destino');
        $documento->fecha_destino = $request->input('fecha_destino');
        $documento->respuesta = $request->input('respuesta');
        $documento->fecha_respuesta = $request->input('fecha_respuesta');


        //$usuario_id, 
        $documento->recibidos()->attach($request->input('recibidos'));
      //  dd($request->input('recibidos'));
        $documento->save();


        $notificacion = "El documento ha sido actualizado.";
        return redirect('documentos')->with(compact('notificacion'));
    }

    public function destroy($id)
    {        
        $documento = Documento::findOrFail($id);   //validar si esta disponible
        $documento->delete();   
        $notificacion = "El documento fue eliminado exitosamente.";
        return redirect('documentos')->with(compact('notificacion'));
    }

    public function disponibilidad(){
        //$usuario_id = auth()->user();
        $usuario_id = 1;
        $documentos = Documento::where('usuario_estado', $usuario_id)
                            ->where('estado', '=', 'ocupado')
                            ->get();
        foreach ($documentos as $documento) {
            $documento->estado = 'disponible';
            $documento->usuario_estado = null;
            $documento->save();
        }
    }

 
}
