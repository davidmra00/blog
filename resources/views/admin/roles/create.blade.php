@extends('adminlte::page')

@section('title','Blog')
    
@section('content_header')
    <h1>
        Crear Rol
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.roles.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name',null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del rol']) !!}
                    @error('name')
                        <span class="text-danger">*{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('permissions', 'Permisos') !!}
                    <br>
                    @foreach ($permissions as $permission)
                        <label class="mr-2">
                        {!! Form::checkbox('permissions[]', $permission->id, null) !!}
                        {{$permission->description}}
                        </label>
                        <br>
                    @endforeach
                    <br>
                    @error('permissions')
                        <span class="text-danger">*{{$message}}</span>
                    @enderror
                </div>
                {!! Form::submit('Crear', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
