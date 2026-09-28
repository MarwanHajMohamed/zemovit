<section class="products-section" id="products">
    <div class="container">
        <div class="mainHeading center">
            <span class="subTitle fadeIn"> {{home_setting(\App\Enums\SectionNamesEnum::FeaturedProducts)->subtitle ?? 'Products'}}</span>
            <h2 class="split-text">
                {{home_setting(\App\Enums\SectionNamesEnum::FeaturedProducts)->subtitle1 ?? 'Products'}} <span class="MainColor"> {{home_setting(\App\Enums\SectionNamesEnum::FeaturedProducts)->subtitle2 ?? 'Products'}}</span>
            </h2>
        </div>
        <div class="swiper-wrapper-container">
            <div class="swiper productSwiper">
                <div class="swiper-button-prev"></div>
                <div class="swiper-wrapper">
                    @forelse($featuredProducts as $product)
                        <div class="swiper-slide" data-title="{{ $product->title }}">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" />
                        </div>
                    @empty
                        <div class="swiper-slide" data-title="Calcium carbonate + vitamin D">
                            <img src="{{ asset('site/img/p1.jpeg') }}" alt="Product 1" />
                        </div>
                        <!-- Add other fallback products similarly -->
                    @endforelse
                </div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
        <div class="slider-caption center" id="sliderCaption">
            @if($featuredProducts->isNotEmpty())
                {{ $featuredProducts->first()->title }}
            @else
                Calcium carbonate + vitamin D
            @endif
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const swiperEl = document.querySelector('.productSwiper');
        const wrapperEl = swiperEl.querySelector('.swiper-wrapper');
        const slides = wrapperEl.querySelectorAll('.swiper-slide');

        // Clone slides until there are at least 8
        while (wrapperEl.querySelectorAll('.swiper-slide').length < 8) {
            slides.forEach(slide => {
                const clone = slide.cloneNode(true);
                wrapperEl.appendChild(clone);
            });
        }

        const swiper = new Swiper(".productSwiper", {
            effect: "coverflow",
            centeredSlides: true,
            slidesPerView: "auto",
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 200,
                modifier: 2.5,
                slideShadows: false,
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
                captionEl.textContent = title || '';
            }
        }
    });
</script>
