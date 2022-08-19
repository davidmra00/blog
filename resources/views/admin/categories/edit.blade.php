@extends('adminlte::page')

@section('title','Blog')
    
@section('content_header')
    <h1>
        Editar Categoria
    </h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model($category,['route'=>['admin.categories.update',$category],'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name',null, ['class'=>'form-control']) !!}
                @error('name')
                    <span class="text-danger">*{{$message}}</span>
                @enderror
            </div>
            {!! Form::submit('Editar', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop
