
@extends('site.layouts.master')
@section('title')
    {{ 'Blogs Page'  }}
@endsection
@section('content')
    <main>
<section class="blogs-page">
  <div class="container">

    <div class="section-header">
      @if(isset($blog_data))
            <h2 class="section-title">{{$blog_data->title}}</h2>
      <p class="section-subtitle">{{$blog_data->subtitle}}</p>
      @else
      <h2 class="section-title">Our Blog</h2>
      <p class="section-subtitle">Latest news, articles, and insights from our team</p>
      @endif
    </div>

    <div class="blogs-grid">
@forelse($blogs as $blog)
       <a href="{{route('blog.details', ['slug' => $blog->slug??'ss' ])}}" class="blog-card">
        @if(isset($blog->image))
        <img src="{{showfile($blog->image)}}" alt="Blog 1">
        @endif
        <div class="card-body">
          @if(isset($blog->title))
          <h3 class="card-title">{{$blog->title}}</h3>
          @endif
          @if(isset($blog->description))
           <p class="card-text">{{$blog->description}}</p>
          @endif
          @if(isset($blog->date))
          <span class="blog-date"><i class="far fa-calendar-alt"></i> {{$blog->date}}</span>
          @endif
        </div>
      </a>
      @empty

      <a href="#" class="blog-card">
        <img src="{{asset('site')}}/img/aboutus.jpeg" alt="Blog 2">
        <div class="card-body">
          <h3 class="card-title">Best Practices for Storing Medicines at Home</h3>
          <p class="card-text">Discover the ideal storage conditions to keep your medicines safe and effective.</p>
          <span class="blog-date"><i class="far fa-calendar-alt"></i> August 20, 2025</span>
        </div>
      </a>

      <a href="#" class="blog-card">
        <img src="{{asset('site')}}/img/Mission.jpg" alt="Blog 3">
        <div class="card-body">
          <h3 class="card-title">Medicines and Supplements: Can You Take Both?</h3>
          <p class="card-text">Important tips on when to consult your doctor before mixing medicines with supplements.</p>
          <span class="blog-date"><i class="far fa-calendar-alt"></i> July 5, 2025</span>
        </div>
      </a>

      <a href="#" class="blog-card">
        <img src="{{asset('site')}}/img/22c9a5e2-ef22-4a60-bb60-79aa66115435.jpg" alt="Blog 4">
        <div class="card-body">
          <h3 class="card-title">Common Medicines for Cold and Flu Relief</h3>
          <p class="card-text">A quick guide to over-the-counter medicines that help ease cold and flu symptoms safely.</p>
          <span class="blog-date"><i class="far fa-calendar-alt"></i> June 25, 2025</span>
        </div>
      </a>

      <a href="#" class="blog-card">
        <img src="{{asset('site')}}/img/aboutus.jpeg" alt="Blog 2">
        <div class="card-body">
          <h3 class="card-title">Best Practices for Storing Medicines at Home</h3>
          <p class="card-text">Discover the ideal storage conditions to keep your medicines safe and effective.</p>
          <span class="blog-date"><i class="far fa-calendar-alt"></i> August 20, 2025</span>
        </div>
      </a>

      <a href="#" class="blog-card">
        <img src="{{asset('site')}}/img/Mission.jpg" alt="Blog 3">
        <div class="card-body">
          <h3 class="card-title">Medicines and Supplements: Can You Take Both?</h3>
          <p class="card-text">Important tips on when to consult your doctor before mixing medicines with supplements.</p>
          <span class="blog-date"><i class="far fa-calendar-alt"></i> July 5, 2025</span>
        </div>
      </a>

      <a href="#" class="blog-card">
        <img src="{{asset('site')}}/img/22c9a5e2-ef22-4a60-bb60-79aa66115435.jpg" alt="Blog 4">
        <div class="card-body">
          <h3 class="card-title">Common Medicines for Cold and Flu Relief</h3>
          <p class="card-text">A quick guide to over-the-counter medicines that help ease cold and flu symptoms safely.</p>
          <span class="blog-date"><i class="far fa-calendar-alt"></i> June 25, 2025</span>
        </div>
      </a>
      @endforelse
    </div>
  </div>
</section>


    </main>
 
@endsection

