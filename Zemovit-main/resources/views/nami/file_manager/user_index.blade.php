@extends('nami.layout.indexs.index')
@section("style")

    {{-- <link rel="stylesheet" href="{{asset("admin")}}/assets/cssbundle/summernote.min.css"/> --}}
    <style>
        .tox-notification,
        .tox .tox-statusbar {
            display: none !important;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
@endsection
@section('page-title')
    {{__('auth.file_manager')}}
@endsection


{{--@dd(Config::get('file-manager.diskList')))--}}

@section('content')
{{--    <div id="fm" style="height: 600px;"></div>--}}
<iframe src="{{ route('unisharp.lfm.show') }}" style="width: 100%; height:600px;"></iframe>

@endsection


@section('js')
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
@endsection
