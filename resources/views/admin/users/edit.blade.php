@extends('adminlte::page')

@section('title','Blog')
    
@section('content_header')
    <h1>
        Editar Roles
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($user,['route'=>['admin.users.update',$user],'method'=>'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name',null, ['class'=>'form-control','readonly'=>true]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('roles', 'Roles') !!}
                    <br>
                    @foreach ($roles as $role)
                        <label class="mr-2">
                        {!! Form::checkbox('roles[]', $role->id, null) !!}
                        {{$role->name}}
                        </label>
                        <br>
                    @endforeach
                    <br>
                    @error('tags')
                        <span class="text-danger">*{{$message}}</span>
                    @enderror
                </div>
                {!! Form::submit('Editar Rloes', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop