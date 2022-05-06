{{--En blade heredamos con @extends--}}
@extends('layouts.app')

@section('titulo','Crear curso')

@section('contenido')
        <br>
        <h3 class="text-center">Creación de nuevo curso</h3>
        <form action="/cursos" method = "POST" enctype="multipart/form-data">

            @csrf {{-- csrf : Es una protección contra ataques malintencionados--}}

            @if ($errors->any())
                @foreach ($errors->all() as $alerta )
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <li>{{$alerta}}</li>
                        </ul>
                    </div>
                @endforeach
            @endif

            <div class="form-group">
                <label for="nombre">Ingrese nombre del curso</label>
                <input id="nombre" class="form-control" type="text" name="nombre">
            </div>
            <div class="form-group">
                <label for="descrip">Ingrese una descripción del curso</label>
                <input id="descrip" class="form-control" type="text" name="descripcion">
            </div>
            <div class="form-group">
                <label for="imagen">Cargue una imagen para el curso</label>
                <br>
                <input id="imagen"  type="file" name="imagen">
            </div>
            <button class="btn btn-dark" type="submit">Crear</button>
        </form>
@endsection
{{--
Esto era antes de heredar la plantilla

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario para crear</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <br>
        <h3 class="text-center">Creación de nuevo curso</h3>
        <form action="" method = "POST">
            <div class="form-group">
                <label for="nombre">Ingrese nombre del curso</label>
                <input id="nombre" class="form-control" type="text" name="nombre">
            </div>
            <div class="form-group">
                <label for="descrip">Ingrese una descripción del curso</label>
                <input id="descrip" class="form-control" type="text" name="descripcion">
            </div>
            <button class="btn btn-dark" type="submit">Crear</button>
        </form>
    </div>
</body>
</html>

 --}}
