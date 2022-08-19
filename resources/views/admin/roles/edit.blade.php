@extends('adminlte::page')

@section('title','Blog')
    
@section('content_header')
    <h1>
        Editar Rol
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($role,['route'=>['admin.roles.update',$role],'method'=>'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name',null, ['class'=>'form-control']) !!}
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
                {!! Form::submit('Editar', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
