<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use ZipArchive;

class ZipController extends Controller
{
    public function downloadZip()
    {
        $zip = new ZipArchive;

        $fileName = 'imagens.zip';

        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE) {
            
            $files = File::files(public_path('storage\imagens'));

            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }

           
            $zip->close();

        
        }

        return response()->download(public_path($fileName))->deleteFileAfterSend(true);
    }
}
