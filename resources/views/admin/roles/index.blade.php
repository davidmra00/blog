@extends('adminlte::page')

@section('title','Blog')
    
@section('content_header')
    <h1>
        Lista de Roles
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @can('admin.roles.create')                            
                <a class="btn btn-primary" href="{{route('admin.roles.create')}}">Crear Rol</a>
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
                    @foreach ($roles as $role)
                        <tbody>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            @can('admin.roles.edit')                                                            
                                <td><a href="{{route('admin.roles.edit',$role)}}">Editar</a></td>
                            @endcan
                            <td>
                                @can('admin.roles.destroy')                                                                    
                                    <form action="{{route('admin.roles.destroy',$role)}}" method="POST">
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
