@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Mostrar Datos</h1>
@stop

@section('content')
<a href="crud/create" class="btn btn-primary">Añadir</a>
<table class="table table-dark table-striped mt-4">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Codigo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
        <tr>
            <td>{{ $producto->id }}</td>
            <td>{{ $producto->codigo }}</td>
            <td>{{ $producto->descripcion }}</td>
            <td>{{ $producto->cantidad }}</td>
            <td>{{ $producto->precio }}</td>
            <td>
                <form action="{{ route ('productos.destroy',$producto->id)}}" method="POST">
                <a href="/productos/{{ $producto->id}}/edit" class="btn btn-info">Editar</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop