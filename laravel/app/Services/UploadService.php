<?php

namespace App\Services;

use App\Services\Contracts\Upload;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

class UploadService implements Upload
{
    public function save(UploadedFile $file): string
    {
        $newName = md5($file->getClientOriginalName());
        $ext = $file->getClientOriginalExtension();
        $relativePath = "/news/{$newName}.{$ext}";

        $result = $file->storeAs('public', $relativePath);

        if ($result !== false) {
            return "/storage" . $relativePath;
        }

        throw new UploadException('File was not uploaded for an unknown reason.');
    }

}
