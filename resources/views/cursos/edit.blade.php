{{--En blade heredamos con @extends--}}
@extends('layouts.app')

@section('titulo','Editar curso')

@section('contenido')
        <br>
        <h3 class="text-center">Modificacion de curso</h3>
        <form action="/cursos/{{$cursito->id}}" method = "POST" enctype="multipart/form-data">
            @method('PUT')

            @csrf {{-- csrf : Es una protección contra ataques malintencionados--}}

            <div class="form-group">
                <label for="nombre">Modificació del nombre del curso</label>
                <input id="nombre" class="form-control" type="text" name="nombre" value="{{$cursito->nombre}}">
            </div>
            <div class="form-group">
                <label for="descrip">modificacion de la descripción del curso</label>
                <input id="descrip" class="form-control" type="text" name="descripcion" value="{{$cursito->descripcion}}">
            </div>
            <div class="form-group">
                <label for="imagen">Cargue una nueva imagen para el curso</label>
                <br>
                <img style="height:180px; width:300px; margin:18px" src="{{ Storage::url($cursito->imagen) }}" class="card-img-top mx-auto d-block" alt="Imagen del curso">
                <input id="imagen"  type="file" name="imagen" value="{{$cursito->imagen}}">
            </div>
            <button class="btn btn-dark" type="submit">Actualizar</button>
        </form>
@endsection
