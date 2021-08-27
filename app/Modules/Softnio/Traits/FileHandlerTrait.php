<?php

namespace App\Modules\Softnio\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait FileHandlerTrait
{
    protected $storagePrefix = 'public';

    public function uploadImage(UploadedFile $uploadedFile = null, $folder = "logo", $height = 300): ?string
    {
        if (is_null($uploadedFile))
            return null;
        $file = $this->saveImage($uploadedFile, $folder, $height);
        if ($file->success)
            return Storage::url($file->path);
        return null;
    }

    public function saveImage(UploadedFile $file, $subdirectory = 'logo', $height = 300): object
    {
        try {
            $file_path = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs($this->storagePrefix . '/' . $subdirectory, $file_path);
            return (object)["success" => true, "message" => "File has been uploaded successfully", "path" => $file_path];
        } catch (\Exception $exception) {
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs($this->storagePrefix . '/' . $subdirectory, $file_name);
            return (object)["success" => true, "message" => "File has been uploaded successfully", "path" => $subdirectory . '/' . $file_name];
        }
    }
}
