<x-app-layout>
    <div class="w-full max-w-xs">
        @if (session('info'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                {{session('info')}}
            </div>
        @endif
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{route('contactanos.store')}}" method="POST">
            @csrf
          <div class="mb-4">
            {!! Form::label('name', 'Nombre', ['class'=>'block text-gray-700 text-sm font-bold mb-2']) !!}
            {!! Form::text('name', null, ['class'=>'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline']) !!}
            @error('name')
              <small>*{{$message}}</small>
            @enderror
          </div>
          <div class="mb-6">
            {!! Form::label('email', 'Nombre', ['class'=>'block text-gray-700 text-sm font-bold mb-2']) !!}
            {!! Form::text('email', null, ['class'=>'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline']) !!}
            @error('email')
              <small>*{{$message}}</small>
            @enderror
          </div>
          <div class="mb-6">
            {!! Form::label('mensaje', 'Nombre', ['class'=>'block text-gray-700 text-sm font-bold mb-2']) !!}
            {!! Form::textarea('mensaje', null, ['class'=>'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline']) !!}
            @error('mensaje')
              <small>*{{$message}}</small>
            @enderror
          </div>
          <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
              Enviar
            </button>
          </div>
        </form>
      </div>
</x-app-layout>