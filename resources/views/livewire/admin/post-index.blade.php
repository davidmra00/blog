<div class="card">
    <div class="cargd-header">
        <input wire:model='search' class="form-control" type="text" placeholder="Buscar">
    </div>
    @if ($posts->count())
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
                @foreach ($posts as $post)
                    <tbody>
                        <td>{{$post->id}}</td>
                        <td>{{$post->name}}</td>
                        <td><a href="{{route('admin.posts.edit',$post)}}">Editar</a></td>
                        <td>
                            <form action="{{route('admin.posts.destroy',$post)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form></td>
                    </tbody>
                @endforeach
            </tr>
        </table>
    </div>
    <div class="card-footer">
        {{$posts->links()}}
    </div>
    @else
    <div class="card-body">
        <strong>No hay registros...</strong>
    </div>
    @endif
</div>
