<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(isset($id))
                {{ __('Editar') }}
            @else
                {{ __('Adicionar') }}
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="row">
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                @if(isset($id))
                                    <form action="{{route('files.update', $item->id)}}" method="post" enctype="multipart/form-data">
                                        {{ method_field('PUT') }}
                                        @else
                                            <form action="{{route('files.store')}}" method="post" enctype="multipart/form-data">
                                                @endif
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nome do arquivo</label>
                                                    <input type="text" class="form-control" name="name" placeholder="Entre com o nome" required value="@if(isset($item)) {{$item->name}} @endif">
                                                    <small id="emailHelp" class="form-text text-muted">Nome do arquivo.</small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Arquivo</label>
                                                    <input type="text" name="arquivoExistente" value="@if(isset($item)) {{ $item->arquivo }} @endif" hidden>
                                                    <input type="file" value="" class="form-control" name="arquivo"
                                                    @if(!isset($item)) required @endif>
                                                </div>
                                                <input type="text" hidden name="user_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                            </form>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
