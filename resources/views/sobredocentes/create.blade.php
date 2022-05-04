@extends('layouts.app')

@section('titulo','Crear docente')

@section('contenido')
        <br>
        <h3 class="text-center">Creación de nuevo docente</h3>
        <form action="/docentes" method = "POST" enctype="multipart/form-data">

            @csrf {{-- csrf : Es una protección contra ataques malintencionados--}}

            <div class="form-group">
                <label for="nombre">Ingrese nombre del  docente</label>
                <input id="nombre" class="form-control" type="text" name="nombre">
            </div>
            <div class="form-group">
                <label for="tituloUniversitario">Ingrese una titulo Universitario del  docente</label>
                <input id="tituloUniversitario" class="form-control" type="text" name="tituloUniversitario">
            </div>
            <div class="form-group">
                <label for="edad">Ingrese una edad del  docente</label>
                <input id="edad" class="form-control" type="number" name="edad">
            </div>
            <div class="form-group">
                <label for="imagen">Cargue una imagen para el  docente</label>
                <br>
                <input id="imagen"  type="file" name="imagen">
            </div>
            <button class="btn btn-dark" type="submit">Crear</button>
        </form>
@endsection
