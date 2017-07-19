<?php

namespace App\Http\Controllers;

use App\FileModel;
use Illuminate\Http\Request;
use Storage;

class FileController extends Controller
{
    public $fileModel;

    public function __construct()
    {
        $this->fileModel = new FileModel();
    }

    public function list()
    {

        return view( 'video.list' )
            ->with( [
                'directoryAndFiles' => $this->fileModel->buildFolders( 'public' ),
                'fileModel' => $this->fileModel
            ] );
    }

    public function show(Request $request)
    {

        return view( 'video.watch' )->with( ['file' => $request->input( 'file' ), 'model' => $this->fileModel] );

    }

    public function test()
    {
        $searchRes = [];
        $search = strtolower( 'AX' );
        $array = Storage::allFiles( 'public' );
        $array = FileModel::sanitizeByFileType( $array, "video/mp4" );

        foreach ($array as $index => $string) {

            $tempString = FileModel::makeSearchLevel( $string, '.mp4' );
            $tempString = strtolower( $tempString );
            if( strpos( $tempString, $search ) !== FALSE )
                $searchRes[] = $string;
        }

        return $searchRes;

    }

    public function torrent()
    {
        return view( 'test.torrent' );
    }

    public function search(Request $request)
    {
        $search = strtolower($request->input( 'search' ));
        $searchRes = [];
        $array = Storage::allFiles( 'public' );
        $array = FileModel::sanitizeByFileType( $array, "video/mp4" );
        foreach ($array as $index => $string) {

            $tempString = FileModel::makeSearchLevel( $string, '.mp4' );
            $tempString = strtolower( $tempString );
            if( strpos( $tempString, $search ) !== FALSE )
                $searchRes[] = $string;
        }

        return $searchRes;

    }

}
