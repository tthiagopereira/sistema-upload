<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Service\FilePathService;
use App\Http\Controllers\Service\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FileController extends Controller
{

    private $fileService;
    private $filePath;
    public function __construct(FileService $fileService, FilePathService $filePathService)
    {
        $this->fileService = $fileService;
        $this->filePath = $filePathService;
    }

    public function index()
    {
        $itens = $this->fileService->index();
        return view('dashboard', compact('itens'));
    }

    public function create()
    {
        return view('vendor.jetstream.components.files.form');
    }

    public function store(Request $request)
    {
        $this->fileService->store($request);
        Session::flash('mensagem',['msg'=>'Registrado com sucesso!','class'=>'alert alert-info']);
        return redirect()->route('dashboard');
    }

    public function edit($id)
    {
        $item = $this->fileService->show($id);
        return view('vendor.jetstream.components.files.form', compact('item', 'id'));
    }

    public function update(Request $request, $id)
    {
        if($request->arquivo) {
            $this->filePath->destroyFile($request->arquivoExistente);
        }
        $this->fileService->update($request, $id);
        Session::flash('mensagem',['msg'=>'Atualizado com sucesso!','class'=>'alert alert-info']);
        return redirect()->route('dashboard');
    }

    public function destroy($id)
    {
        $this->fileService->destroy($id);
        Session::flash('mensagem',['msg'=>'Deletado com sucesso!','class'=>'alert alert-danger']);
        return redirect()->route('dashboard');
    }
}
