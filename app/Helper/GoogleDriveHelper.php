<?php

namespace App\Helper;

use Illuminate\Support\Facades\Storage;

class GoogleDriveHelper
{
    public static function findDirProject($name)
    {
        $listFolders = collect(Storage::cloud()->listContents('/', false));
        
        return $listFolders->where('type', 'dir')->where('filename', $name)->first();
    }

    public static function findDir($projectName, $name)
    {
        $dirParrent = self::findDirProject($projectName);

        $listFolders = collect(Storage::cloud()->listContents($dirParrent['path'], true));

        return $listFolders->where('type', 'dir')->where('filename', $name)->first();
    }

    public static function makeDirProject($name)
    {
        $dir = self::findDirProject($name);

        if (!$dir) {
            return Storage::cloud()->makeDirectory($name);
        }
    }

    public static function makeSubDir($projectDirRoot)
    {
        $dir = self::findDirProject($projectDirRoot);
        
        if ($dir) {
            if (!self::findDir($projectDirRoot, 'Document')) {
                Storage::cloud()->makeDirectory($dir['path'] . '/Document');
            }
            if (!self::findDir($projectDirRoot, 'Management')) {
                Storage::cloud()->makeDirectory($dir['path'] . '/Management');
            }
            if (!self::findDir($projectDirRoot, 'Public')) {
                Storage::cloud()->makeDirectory($dir['path'] . '/Public');
            }
        }

        return true;
    }

    public static function makeDir($projectName, $parentDir, $subDir)
    {
        $dir = self::findDir($projectName, $parentDir);

        if ($dir && !self::findDir($projectName, $subDir)) {
            return Storage::cloud()->makeDirectory($dir['path'] . '/' . $subDir);
        }
    }

    public static function getPath($projectName, $name)
    {
        return self::findDir($projectName, $name)['path'];
    }

    public static function findFile($projectName, $name)
    {
        $dirParrent = self::findDirProject($projectName);

        $listFiles = collect(Storage::cloud()->listContents($dirParrent['path'], true));

        return $listFiles->where('type', 'file')->where('name', $name)->first();
    }
}
