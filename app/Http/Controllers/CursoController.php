<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Http\Controllers\infoController;
use App\Http\Requests\CursoRequest;




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
    public function store(CursoRequest $request)
    {
        //Validaciones
        /*$validacionDatos = $request->validate([
            'nombre'=>'required|max:10',
            'imagen'=>'required|image'
        ]);*/

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
        $cursito = Curso::find($id);#find encontrar--que encuentre el id
        return view('cursos.show',compact('cursito'));#adjunto el cursito $cursito y se adjunta como un string
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        #con firstOrFail() se capturó la excepción y el primer registro encontrado en la BD o lanza error
        $cursito = Curso::where('id',$id)->firstOrFail();
        //return $cursito;
        return view('cursos.edit',compact('cursito'));
        #el 'cursito' ->$cursito
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
        //update verdaderamenteactualiza
        $cursito=Curso::find($id);
        //rellenar todos los campos del Curso con lo que viene en la info o request
        #$cursito->fill($request->all());

        //con este se llennan todos los campos menos imagen
        $cursito->fill($request->except('imagen'));
        if($request->hasFile('imagen')){
            $cursito->imagen = $request->file('imagen')->store('public/cursos');
        }

        #$request se llena con all()
        //return $request;
        $cursito->save();
        return 'Curso actualizado Correctamente';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cursito = Curso::find($id);
        //return $cursito;
        $urlImagenBD = $cursito->imagen;
        #ruta de la imagen de la BD
        //return $urlImagenBD;
        //$rutacompleta = public_path().$urlImagenBD;
        //return $rutacompleta;
        $nombreImagen = str_replace('public/','\storage\\',$urlImagenBD);
        //return $nombreImagen;
        #el método str_replace:su función es remplazar una parte de la ruta por lo que
        #nodotros deseemeos--en este código la parte public/ es reemplazada por \storage\


        $rutacompleta = public_path().$nombreImagen;
        //return $rutacompleta;
        unlink($rutacompleta);
        $cursito->delete();
        return 'Curso eliminado';
    }




}
