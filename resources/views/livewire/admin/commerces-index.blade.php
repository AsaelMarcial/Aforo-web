<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingresa el nombre de un comercio">
    </div>

    @if($commerces->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th colspan="2"></th>
                </tr>
                </thead>

                <tbody>
                @foreach($commerces as $commerce)
                    <tr>
                        <td>{{ $commerce->id }}</td>
                        <td>{{ $commerce->name }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm"
                               href="{{route('admin.commerces.edit', $commerce)}}">Editar</a>
                        </td>
                        <td>
                            <form action="{{route('admin.commerces.destroy',$commerce)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>

        <div class="card-footer">
            {{$commerces->links()}}
        </div>
    @else
        <div class="card-body">
            <div class="alert alert-info">
                Sin resultados.
            </div>
        </div>

    @endif

</div>
