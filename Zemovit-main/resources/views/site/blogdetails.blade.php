@extends('site.layouts.master')
@section('title')
    {{ 'Blog Deatails Page  '  }}
@endsection
@section('content')
    <main>
   
 <section class="blog-details">
    
  <!-- Slider -->
  <div class="swiper blog-slider">
    <div class="swiper-wrapper">
      <!-- Image Slide -->
   @forelse($blog->images as $media)
    <div class="swiper-slide">
        @if($media->type === 'image')
            <img src="{{ showFile($media->image) }}" alt="Blog Image" class="img-fluid">
        @elseif($media->type === 'video')
            <video controls class="w-100">
                <source src="{{ showFile($media->image) }}" type="video/mp4">
                متصفحك لا يدعم تشغيل الفيديو.
            </video>
        @else
            <a href="{{ showFile($media->image) }}" target="_blank">
                {{ __('Download File') }}
            </a>
        @endif
    </div>
@empty
    <div class="swiper-slide">
        <img src="{{ showFile($blog->image) }}" alt="Blog Image" class="img-fluid">
    </div>
@endforelse

      <!-- Image Slide -->
 
     
    </div>

    <!-- Navigation -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>

  <!-- Content -->
  <div class="blog-content">
    <h2 class="blog-title">{{$blog->title}}</h2>
    <span class="blog-date"><i class="far fa-calendar-alt"></i> {{$blog->date}}</span>
    <p class="blog-description">
     <div>{!! $blog->description !!}</div>
    </p>
  </div>
</section>
    </main>
  @endsection
