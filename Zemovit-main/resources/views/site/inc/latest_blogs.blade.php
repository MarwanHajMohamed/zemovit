     <section class="blog-slider">
        <div class="container">
          <div class="mainHeading center">
            <span class="subTitle fadeIn">Blogs</span>
            <h2 class="split-text">
              Latest <span class="MainColor">Blog</span> Posts
            </h2>
          </div>

          <!-- Swiper -->
          <div class="swiper blog-swiper">
            <div class="swiper-wrapper">
               @forelse($latest_blogs as $blog)


              <div class="swiper-slide">
                <a href="{{route('blog.details', ['slug' => $blog->slug??'ss' ])}}" class="blog-card">
                  <img src="{{showfile($blog->image) }}" alt="" />
                  <div class="card-body">
                    <h3 class="card-title">
                      {{$blog->title}}
                     </h3>
                    <p class="card-text">
  {{ Str::limit($blog->description, 100) }}
                    </p>
                    <span class="blog-date"
                      ><i class="far fa-calendar-alt"></i> {{ $blog->date ?? $blog->date->format('M d, Y') }}</span
                    >
                  </div>
                </a>
              </div>

              @empty

<div class="mainHeading center mt-5" >
  <h1>Comming Soon</h1>
</div>
             
              @endforelse
            </div>

            <!-- pagination -->
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </section>