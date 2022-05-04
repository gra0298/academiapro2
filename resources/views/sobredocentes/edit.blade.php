@extends('layouts.app')

@section('titulo','Editar Docente')

@section('contenido')
        <br>
        <h3 class="text-center">Modificacion de docente</h3>
        <form action="/docentes/{{$docente->id}}" method = "POST" enctype="multipart/form-data">
            @method('PUT')

            @csrf {{-- csrf : Es una protección contra ataques malintencionados--}}

            <div class="form-group">
                <label for="nombre">Modificación del nombre del docente</label>
                <input id="nombre" class="form-control" type="text" name="nombre" value="{{$docente->nombre}}">
            </div>
            <div class="form-group">
                <label for="tituloUniversitario">modificacion del titulo universitario del curso</label>
                <input id="tituloUniversitario" class="form-control" type="text" name="tituloUniversitario" value="{{$docente->tituloUniversitario}}">
            </div>
            <div class="form-group">
                <label for="imagen">Cargue una nueva imagen para el docente</label>
                <br>
                <img style="height:180px; width:300px; margin:18px" src="{{ Storage::url($docente->imagen) }}" class="card-img-top mx-auto d-block" alt="Imagen del docente">
                <input id="imagen"  type="file" name="imagen" value="{{$docente->imagen}}">
            </div>
            <button class="btn btn-dark" type="submit">Actualizar</button>
        </form>
@endsection
