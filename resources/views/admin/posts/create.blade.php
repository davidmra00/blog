@extends('adminlte::page')

@section('title','Blog')
    
@section('content_header')
    <h1>
        Crear Post
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.posts.store','files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name',null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del post','autocomplete'=>'off']) !!}
                    @error('name')
                        <span class="text-danger">*{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('category_id', 'Categoria') !!}
                    {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
                </div>
                <div class="row mb-3">
                    <div class="mb-3 mr-3">
                        <img id="picture" src="{{Storage::url('posts/faker.png')}}" alt="">
                    </div>
                    <div>
                        {!! Form::label('file', 'Selecione una imagen') !!}
                        {!! Form::file('file', ['class'=>'form-control-file','accept'=>'image/*']) !!}
                        @error('file')
                            <span class="text-danger">*{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('etiquetas', 'Etiquetas') !!}
                    <br>
                    @foreach ($tags as $tag)
                        <label class="mr-2">
                        {!! Form::checkbox('tags[]', $tag->id, null) !!}
                        {{$tag->name}}
                        </label>
                    @endforeach
                    <br>
                    @error('tags')
                        <span class="text-danger">*{{$message}}</span>
                    @enderror
                </div>
                <div class="fourm-group">
                    {!! Form::label('extract', 'Extracto') !!}
                    {!! Form::textarea('extract', null, ['class'=>'form-control']) !!}
                    @error('extract')
                        <span class="text-danger">*{{$message}}</span>
                    @enderror
                </div>
                <div class="fourm-group mb-2">
                    {!! Form::label('body', 'Cuerpo del Post') !!}
                    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
                    @error('body')
                        <span class="text-danger">*{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mr-2">
                    <label>
                        {!! Form::radio('status', 1, true) !!}
                        Borrador
                    </label>
                    <label>
                        {!! Form::radio('status', 2) !!}
                        Publicado
                        </label>
                </div>
                {!! Form::submit('Crear', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{asset('vendor/ckeditor5-build-classic/ckeditor.js')}}"></script>

    <script>
        ClassicEditor
        .create(document.querySelector('#extract'))
        .catch(error=>{
            console.error(error);
        });
        ClassicEditor
        .create(document.querySelector('#body'))
        .catch(error=>{
            console.error(error);
        });

        //cambiar imagen
        document.getElementById("file").addEventListener('change',cambiarImagen);

        function cambiarImagen(event){
            var file=event.target.files[0];
            var reader=new FileReader();
            reader.onload=(event)=>{
                document.getElementById("picture").setAttribute('src',event.target.result);
            }
            reader.readAsDataURL(file);
        }
    </script>
@endsection