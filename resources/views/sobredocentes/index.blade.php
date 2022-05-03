
@extends('layouts.app')
@section('titulo','Listado Docentes')
@section('contenido')
<br>
<h3> Aquí encontrará el listado de Docentes</h3>
    {{--  Con foreach hago el recorrido al array enviado. $cursito    --}}
    <div class="row">
    @foreach ( $docente as $alias )
        <div class="col-sm">
            <br>
            <div class="card text-center" style="width: 18rem; margin-top:20px">

                <div class="card-body">
                    <h5 class="card-title">{{$alias->nombre}}</h5>
                    <a href="/docentes/{{$alias->id}}" class="btn btn-dark">Ver mas</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection
