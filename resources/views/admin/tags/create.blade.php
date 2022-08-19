@extends('adminlte::page')

@section('title','Blog')
    
@section('content_header')
    <h1>
        Crear Etiqueta
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.tags.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name',null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre de la etiqueta']) !!}
                    @error('name')
                        <span class="text-danger">*{{$message}}</span>
                    @enderror
                </div>
                {!! Form::submit('Crear', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
