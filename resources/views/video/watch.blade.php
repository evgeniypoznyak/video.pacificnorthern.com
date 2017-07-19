@extends('layouts.app')

@section('content')
    <h1>{{$model->makeHeaderVideo($file, '.mp4')}}</h1>
    <video id="myVideo" src="{{Storage::url($file)}}" width="auto"
           controls>{{$model->makeHeaderVideo($file, '.mp4')}}</video>
@endsection

@section('scriptForVideo')
    <script src="{{ mix('js/video.js') }}"></script>
@endsection

