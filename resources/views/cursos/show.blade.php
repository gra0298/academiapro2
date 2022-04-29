@extends('layouts.app')

@section('titulo','detalle curso')#titulo pestaña de arriba
@section('contenido')
<br>
<div class="text-center">
    <h3 class="text-center">Detalle del curso</h3>
    <img style="height:180px; width:300px; margin:18px" src="{{ Storage::url($cursito->imagen) }}" class="card-img-top mx-auto d-block" alt="Imagen del curso">
    <p class="card-text text-center">{{$cursito->descripcion}}</p>
    <a href="/cursos/{{$cursito->id}}/edit" class="btn btn-dark">Editar</a>
</div>


@endsection
