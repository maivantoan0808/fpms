<?php

namespace App\Helper;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\UploadException;
use Intervention\Image\Facades\Image;

class FileHelper
{
    public static function renameImage($slug, $image)
    {
        $currentDate = Carbon::now()->toDateString();
        $imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

        return $imageName;
    }

    public static function makeFolder($folder)
    {
        if (!Storage::disk('public')->exists($folder)) {
            return Storage::disk('public')->makeDirectory($folder);
        }
    }

    public static function saveImage($pathImage, $postImage)
    {
        return Storage::disk('public')->put($pathImage, $postImage);
    }

    public static function getPath($pathFolder, $imageName)
    {
        return Storage::disk('public')->url($pathFolder . $imageName);
    }

    public static function deleteOldFile($pathFolder, $imageName)
    {
        if (Storage::disk('public')->exists($pathFolder . $imageName)) {
            return Storage::disk('public')->delete($pathFolder . $imageName);
        }
    }
}
