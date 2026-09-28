@extends('site.layouts.master')
@section('title')
    {{ 'Therapeutic Area'  }}
@endsection
@section('content')
    @include('site.inc.therapeutic_area')
    @include('site.inc.latest_blogs')
 @endsection
