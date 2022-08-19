@extends('adminlte::page')

@section('title','Blog')
    
@section('content_header')
    <h1>
        Lista de Categorias
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @can('admin.categories.create')
                <a class="btn btn-primary" href="{{route('admin.categories.create')}}">Crear Categoria</a>
            @endcan
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </thead>
                </tr>
                <tr>
                    @foreach ($categories as $category)
                        <tbody>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            @can('admin.categories.edit')
                                <td><a href="{{route('admin.categories.edit',$category)}}">Editar</a></td>
                            @endcan
                            <td>
                                @can('admin.categories.destroy')
                                    <form action="{{route('admin.categories.destroy',$category)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit">Eliminar</button>
                                    </form></td>
                                @endcan
                        </tbody>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>
@stop
