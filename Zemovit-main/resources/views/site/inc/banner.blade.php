<section class="hero" id="Hero" >
    <div class="container h-full align-center">
        <div class="heroContent w-8/10 max-w-full lg-max:w-full mx-auto text-center" >
            @if($banner)
                <h1 class="fs-60 split-text md-max:fs-36">
                    {!! $banner->translate()->title ?? 'Complete Medical Solutions for a Healthier Life' !!}
                </h1>
                <p class="fs-16 line-relaxed py-8 split-lines">
                    {{ $banner->translate()->description ?? 'At our company, we believe that prevention and healing begin with quality pharmaceuticals. We offer a wide selection of certified medications and nutritional supplements designed to support a healthy lifestyle.' }}
                </p>
                @if($banner->btn_link)
                    <button class="btn btn-rounded mainColor">
                        <a href="{{ $banner->btn_link }}">{{__('site.Ready_to_level_up')}}</a>
                    </button>
                @endif
            @else
                <h1 class="fs-60 split-text md-max:fs-36">
                    Complete Medical Solutions for a Healthier Life
                </h1>
                <p class="fs-16 line-relaxed py-8 split-lines">
                    At our company, we believe that prevention and healing begin with quality pharmaceuticals.
                    We offer a wide selection of certified medications and nutritional supplements designed to
                    support a healthy lifestyle. Our focus is on delivering effective, safe, and innovative
                    healthcare products that meet your everyday medical needs. Invest in your well-being today
                    for a better tomorrow.
                </p>
                <button class="btn btn-rounded mainColor">
                    <a href="{{ route('contact') }}">Ready to level up</a>
                </button>
            @endif
        </div>
    </div>
</section>

ظ