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

@section('content')
<a href="{{ route('download-database-backup.index') }}" class="btn btn-primary downloadDatabase">
    <i class="fa fa-download"></i> {{ __("auth.Database Backup") }}
</a>
    <div id="fm" style="height: 600px;"></div>
@endsection


@section('js')
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
@endsection
