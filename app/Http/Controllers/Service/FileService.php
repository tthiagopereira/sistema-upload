<?php

namespace App\Http\Controllers\Service;

use App\Models\File;
use Illuminate\Http\Request;

class FileService
{
    private $file;
    private $filePath;
    public function __construct(File $file, FilePathService $filePathService)
    {
        $this->file = $file;
        $this->filePath = $filePathService;
    }

    public function index()
    {
        return $this->file::with('user')->get();
    }

    public function store(Request $request)
    {
        $item = new $this->file();
        $item->name = $request->name;
        $item->arquivo = $this->filePath->saveFile($request->file('arquivo'));
        $item->user_id = $request->user_id;
        $item->save();
    }

    public function update(Request $request, $id)
    {
        $item = $this->show($id);
        $item->name = $request->name;
        if($request->arquivoExistente) {
            $item->arquivo = $request->arquivoExistente;
        }
        if($request->arquivo) {
            $item->arquivo = $this->filePath->saveFile($request->file('arquivo'));
        }
        $item->user_id = $request->user_id;
        $item->update();
    }

    public function show($id)
    {
        return $this->file::find($id);
    }

    public function destroy($id)
    {
        $item = $this->show($id);
        $this->filePath->destroyFile($item->caminho);
        $item->delete();
    }
}
