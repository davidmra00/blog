<div class="card">
    <div class="card-header">
        <input wire:model='search' class="form-control" type="text" placeholder="Buscar">
    </div>
    @if ($users->count())
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
                @foreach ($users as $user)
                    <tbody>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td><a href="{{route('admin.users.edit',$user)}}">Editar roles</a></td>
                        <td>
                            <form action="{{route('admin.users.destroy',$user)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Eliminar Usuario</button>
                            </form>
                        </td>
                    </tbody>
                @endforeach
            </tr>
        </table>
    </div>
    <div class="card-footer">
        {{$users->links()}}
    </div>
    @else
    <div class="card-body">
        <strong>No hay registros...</strong>
    </div>
    @endif
</div>
