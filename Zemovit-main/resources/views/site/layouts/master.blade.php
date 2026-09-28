    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{
    (setting('favicon') && setting('favicon') !== 'favicon.png')
        ? asset('storage').'/'.setting('favicon')
        : asset('site/img/fav.svg')
}}" type="image/x-icon"
    />
    <title>@yield('title',setting('website_name') ?? 'Zemovit')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Meta Tags -->
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('site/css/fontawesome.min.css') }}" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('site/css/style.css?v=6') }}" />
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    @stack('styles')
</head>

<body>
<!-- Preloader -->
<div class="preLoader">
    <figure class="Loading"></figure>
</div>

<!-- Header -->
@include('site.partials.header')

@yield('content')
<!-- Footer -->
@include('site.partials.footer')

<!-- Scripts -->
<!-- GSAP CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<!-- ScrollTrigger CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<!-- SplitText -->
<script src="{{ asset('site/js/SplitText.min.js') }}"></script>
<!-- Lenis -->
<script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@latest/dist/lenis.min.js"></script>
<!-- Swiper -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- Custom JS -->
<script src="{{ asset('site/js/main.js?v=3') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const swiperEl = document.querySelector('.productSwiper');
        const wrapperEl = swiperEl.querySelector('.swiper-wrapper');
        const slides = wrapperEl.querySelectorAll('.swiper-slide');

        // If slides are too few for loop mode, clone them
        if (slides.length < 6) { // Adjust threshold as needed
            slides.forEach(slide => {
                const clone = slide.cloneNode(true);
                wrapperEl.appendChild(clone);
            });
        }

        const swiper = new Swiper(".productSwiper", {
 effect: "coverflow",
    centeredSlides: true, // Crucial for having one in the middle and spreading others
    initialSlide: 2, // Start with the middle slide (0-indexed, so 2 for the 3rd of 5)
    slidesPerView: 3, // Set to 3 to show current, next, prev. The other two will be visible due to coverflow.
    loop: false,
    autoplay: false,
    coverflowEffect: {
        rotate: 0, // No rotation
        stretch: 80, // Adjust stretch to control distance between slides
        depth: 100, // Adjust depth for 3D effect. Smaller values make them appear flatter.
        modifier: 1, // Adjust modifier to control the intensity of the effect
        slideShadows: false, // Keep shadows off unless you want them
    },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            on: {
                init: updateCaption,
                slideChange: updateCaption
            }
        });

        function updateCaption() {
            const captionEl = document.getElementById("sliderCaption");
            const activeSlide = document.querySelector(".swiper-slide-active");
            if (activeSlide && captionEl) {
                const title = activeSlide.getAttribute("data-title");
                captionEl.textContent = '' || '';
            }
        }
    });
</script>
<script>
    @php use App\Models\Zemovit\WhyChooseUs; @endphp

    document.addEventListener('DOMContentLoaded', function () {
        fetch("{{ route('page-view.store') }}", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                _method: 'POST',
                'page_link': "{{ request()->path() }}"
            })
        })
            .then(response => response.json())
            .then(data => {
            })
            .catch(error => {
            });
    });

</script>
<script>
  var swiper = new Swiper(".blog-slider", {
    loop: true,
    spaceBetween: 0,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>

    <script>
      const swiper = new Swiper(".productSwiper", {
        effect: "coverflow",
        // grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        loop: true,
        // autoplay: {
        //   delay: 3000,
        //   disableOnInteraction: false,
        // },
        coverflowEffect: {
          rotate: 0,
          stretch: 0,
          depth: 200,
          modifier: 2.5,
          slideShadows: false,
        },
        on: {
          slideChange: function () {
            updateCaption();
          },
          init: function () {
            updateCaption();
          },
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });

      function updateCaption() {
        const captionEl = document.getElementById("sliderCaption");
        const activeSlide = document.querySelector(".swiper-slide-active");
        if (activeSlide) {
          const title = activeSlide.getAttribute("data-title");
          captionEl.textContent = title;
        }
      }
    </script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const swiper = new Swiper(".blog-swiper", {
          slidesPerView: 3,
          spaceBetween: 20,
          loop: true,
          autoplay: {
            delay: 3000,
            disableOnInteraction: false,
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
          breakpoints: {
            0: { slidesPerView: 1 },
            576: { slidesPerView: 2 },
            992: { slidesPerView: 3 },
          },
        });
      });
    </script>
@stack('scripts')
</body>
</html>
