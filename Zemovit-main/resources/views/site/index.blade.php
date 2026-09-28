@extends('site.layouts.master')
@section('title')
    {{ 'Home Page'  }}
@endsection
@section('content')
    <main>
      @foreach($home_setting as $it)
      @include('site.inc.'.$it->section_name)
      @endforeach
    </main>
@endsection
