<?php

namespace App\Http\Controllers\Service;

use Illuminate\Support\Facades\File;

class FilePathService
{

    public function saveFile($image) {
        $rand = rand(11111,99999);
        $diretorio = 'file';
        $ext = $image->guessClientExtension();
        $nomeArquivo = "_file_".$rand.".".$ext;
        $image->move($diretorio,$nomeArquivo);
        return $diretorio.'/'.$nomeArquivo;
    }

    public function destroyFile($caminho) {
        File::delete($caminho);
        return true;
    }

}
