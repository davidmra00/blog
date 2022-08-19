@extends('adminlte::page')

@section('title','Blog')
    
@section('content_header')
    <h1>
        Lista de Etiquetas
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @can('admin.tags.create')                            
                <a class="btn btn-primary" href="{{route('admin.tags.create')}}">Crear Etiqueta</a>
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
                    @foreach ($tags as $tag)
                        <tbody>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            @can('admin.tags.edit')                                                            
                                <td><a href="{{route('admin.tags.edit',$tag)}}">Editar</a></td>
                            @endcan
                            <td>
                                @can('admin.tags.destroy')                                                                    
                                    <form action="{{route('admin.tags.destroy',$tag)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit">Eliminar</button>
                                    </form>
                                @endcan
                            </td>
                        </tbody>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>
@stop
