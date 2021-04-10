<div class="row mt-3">
    <div class="container">
        @if(Session::has('mensagem'))
            <div class="container">
                <div class="row">
                    <div class="card {{ Session::get('mensagem')['class'] }}">
                        <div align="center" class="card-content">
                            {{ Session::get('mensagem')['msg'] }}
                        </div>
                    </div>
                </div>

            </div>
        @endif
    </div>
</div>

<div class="row mt-4">
    <div class="container mt-5">
        <a href="{{ route('files.create') }}" class="btn btn-success">Adicionar</a>
        <table class="table mt-3">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome do arquivo</th>
                <th scope="col">Arquivo</th>
                <th scope="col">Dono</th>
                <th scope="col">#</th>
            </tr>
            </thead>
            <tbody>
            @foreach($itens as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->name }}</td>
                <td><a href="{{$item->arquivo}}" target="_blank" class="btn btn-info" >Download</a></td>
                <td>{{ $item->user->name }}</td>
                <td>
                    <a href="{{ route('files.edit', $item->id) }}" class="btn btn-dark">Editar</a>
                    <a href="{{ route('file.destroy', $item->id) }}" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
