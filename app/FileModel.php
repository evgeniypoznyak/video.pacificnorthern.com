<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class FileModel extends Model
{

    public static function makeHeaderVideo($string, $symbol){

            $string = explode($symbol, $string);
            $string = array_first($string);
            $string = explode('/', $string);
            $string = array_last( $string );
            return $string;

    }

    public static function makeSearchLevel($string, $symbol){

            $string = explode($symbol, $string);
            $string = array_first($string);
            $string = explode('/', $string);
            array_shift($string);
            array_shift($string);
            $string = implode('/', $string );
            return $string;

    }


    public function makeStringPretty($string, $symbol)
    {
        $string = explode($symbol, $string);
        $string = end($string);

        return $string;
    }



    public static function sanitizeByFileType($arrayOfFiles, $fileType)
    {
        $tempArray = [];
        foreach ($arrayOfFiles as $file) {
            if (Storage::mimeType($file) != $fileType) {
                continue;
            }
            $tempArray [] = $file;
        }

        return $tempArray;
    }

    public function buildFolders($directory)
    {

        $tempArray     = [];
        $mainDirectory = Storage::directories($directory);
        /*dump(Storage::allFiles($directory));*/

        foreach ($mainDirectory as $department) {


            $category = Storage::directories($department);

            foreach ($category as $tutorials) {

                $lessons = Storage::directories($tutorials);

              //  $lessons = Storage::directories($category);
                foreach ($lessons as $lesson) {
                    $files                           = $this->sanitizeByFileType(Storage::files($lesson), "video/mp4");


                    $tempArray [$department][$tutorials] [$lesson] = $files;
                }
// 
            }
        }
        return $tempArray;
    }
}
