<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Con el metodo all traigo toda la información de la tabla como array
        $cursito = Curso::all();
        return view('cursos.index',compact('cursito')); //adjunto la información que quiero para la vista. dar uso de estos comandos
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Almacena un nuevo registro creado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // all: me trae toda la informacion almacenada en request
        //return $request->all();
        //creamos una instancia del modelo para manipular la tabla Curso
        $cursito = new Curso();
        // a travez de ka unstancia $cursito llamo al campo nombre de la
        // tabla curso y le asigno el valor que viene del request
        $cursito->nombre = $request->input('nombre');
        //hago lo mismo con el campo de descripcion
        $cursito->descripcion = $request->input('descripcion');

        /*
            Validamos si viene un archivo del campo image, es el name del input
            Luego en el campo imagen(de la base de datos) se almacenará el
            nombre del archivo uqe se va a guardar en storage/app/public e
            indicamos una subcarpeta de guardado para ser mas ordenados,
            en nuestro caso se llama cursos
        */
        if($request->hasFile('imagen')){
            $cursito->imagen = $request->file('imagen')->store('public/cursos');
        }
        $cursito->save();
        return 'Curso creado exitosamente';

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
