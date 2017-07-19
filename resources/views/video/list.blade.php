@extends('layouts.app')

@section('content')

<div class="jumbotron myHeader">Video Tutorials</div>
    <div class="accordion">

        @foreach($directoryAndFiles  as $keyDepartment => $department)
            <h3>{{-- Category: --}}{{$fileModel->makeStringPretty($keyDepartment, '/')}} </h3>
            <div class="accordion">


                @foreach($department as $keyCategory => $category)

                    <h3>{{-- Tutorial: --}}{{$fileModel->makeStringPretty($keyCategory, '/')}} </h3>
                    <div>



                        <div class="accordion">


                            @foreach($category as $tutorial => $files)

                                <h3>{{-- Tutorial: --}}{{$fileModel->makeStringPretty($tutorial, '/')}} </h3>
                                <div>




                        @foreach($files as $file)

                            <div>
                                <form action="{{url('watch')}}" method="get">
                                    {{--{{ csrf_field() }}--}}
                                   {{-- <button name="file" value="{{$file}}" class="ui-state-highlight" type="submit">
                                        {{$fileModel->makeStringPretty($file, '/')}}
                                    </button>--}}
                                    <button id="{{$file}}" name="file" value="{{$file}}" class="ui-button myCustomList" type="submit">
                                        {{$fileModel->makeStringPretty($file, '/')}}
                                    </button>
                                </form>
                            </div>

                        @endforeach


                                </div>
                                    @endforeach

                                </div>








                    </div>
                @endforeach


            </div>
        @endforeach

    </div>
@endsection


@section('search-bar')
    <div class="col-sm-3 col-md-3 pull-right">
        <form action="{{route('search')}}" class="navbar-form" role="search" id="search-form" method="post">
            <div class="input-group" id="search-div">
                {{csrf_field()}}
                <input
                        minlength="2"
                        style="background-color: #333333; color: white"
                        type="text"
                        class="form-control"
                        placeholder="Search"
                        name="search-video"
                        id="srch-term">
                <div class="input-group-btn">
                    <button
                            style="background-color: #333333; color: white;"
                            class="btn btn-default"
                            type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
        </form>
    </div>
@endsection
