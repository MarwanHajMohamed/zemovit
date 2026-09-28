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
              <!-- <div class="swiper-button-prev"></div> -->

              <div class="swiper-wrapper">
                @forelse($featuredProducts as $product)
                <div
                  class="swiper-slide"
                  data-title="{{$product->title}}"
                >
                  <img src="{{showfile($product->image)}}" alt="{{$product->title}}" />
                </div>
                @empty
                <div class="swiper-slide" data-title="Calcium carbonate">
                  <img src="{{asset('site')}}/img/2.jpg" alt="Product 2" />
                </div>
                <div class="swiper-slide" data-title="Magnesium citrate">
                  <img src="{{asset('site')}}/img/3.jpg" alt="Product 3" />
                </div>
                <div class="swiper-slide" data-title="Calcium Lactate">
                  <img src="{{asset('site')}}/img/4.jpg" alt="Product 4" />
                </div>
                <div class="swiper-slide" data-title="Zinc sulphate">
                  <img src="{{asset('site')}}/img/5.jpg" alt="Product 5" />
                </div>
                <div class="swiper-slide" data-title="Vitamine D3">
                  <img src="{{asset('site')}}/img/6.jpg" alt="Product 6" />
                </div>
                <div class="swiper-slide" data-title="Vitamine D3">
                  <img src="{{asset('site')}}/img/7.jpg" alt="Product 7" />
                </div>
                <div class="swiper-slide" data-title="Zinc sulphate">
                  <img src="{{asset('site')}}/img/8.jpg" alt="Product 8" />
                </div>
                @endforelse
              </div>
              <!-- <div class="swiper-button-next"></div> -->
            </div>
          </div>
          <!-- Caption -->
          <div class="slider-caption center" id="sliderCaption">
  @if($featuredProducts->isNotEmpty())
                {{ $featuredProducts->first()->title }}
            @else
                Calcium carbonate + vitamin D
            @endif          </div>
        </div>
      </section>