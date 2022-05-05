<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\infoDocentes;
use App\Models\docentes;

class docentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docente = Docentes::all();//se instancia el modelo
        return view('sobredocentes.index',compact('docente'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sobredocentes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $docente = new docentes();
        $docente ->nombre = $request->input('nombre');
        $docente ->tituloUniversitario = $request->input('tituloUniversitario');
        $docente ->edad = $request->input('edad');

        if($request->hasFile('imagen')){
            $docente->imagen = $request->file('imagen')->store('public/docentes');
        }
        $docente-> save();
        //return 'docente creado correctamente';
        return view('sobredocentes.correcto');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $docente = Docentes::find($id);//se instancia el modelo
        return view('sobredocentes.show',compact('docente'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $docente = Docentes::where('id',$id)->firstOrFail();
        //return $docente;
        return view ('sobredocentes.edit',compact('docente'));;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $docente=Docentes::find($id);
        $docente->fill($request->except('imagen'));
        if($request->hasFile('imagen')){
            $docente->imagen = $request->file('imagen')->store('public/docentes');
        }
        $docente->save();
        return 'Docente actualizado Correctamente';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $docente = Docentes::find($id);
        //return $docente;
        $urlImagenBD = $docente->imagen;#ruta de la imagen de la BD
        //return $urlImagenBD;
        //$rutacompleta = public_path().$nombreImagen;
        //return $rutacompleta;

        $nombreImagen = str_replace('public/','\storage\\',$urlImagenBD);
       // return $nombreImagen;
        $rutacompleta = public_path().$nombreImagen;
        //return $rutacompleta;
        unlink($rutacompleta);
        $docente->delete();
        return 'Docente eliminado';
    }
}
