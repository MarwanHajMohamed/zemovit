<section class="about" id="About">
    <div class="container h-full">
        <div class="d-grid grid-col-1 lg:grid-col-2 h-full gap-14 items-center mb-14">
            <div class="aboutContent lg-max:row-s-2 lg-max:row-e-2">
                <div class="mainHeading smallGap">
                    <span class="subTitle fadeIn">
                        {{ $about->title ?? 'About Us' }}
                    </span>
                    <h2 class="split-text">
                      {{$about->subtitle ?? ' Who are'}}  <span class="MainColor"> {{$about->subtitle2 ?? 'Zemovit'}}</span>
                    </h2>
                </div>
                <p class="aboutOverview line-relaxed split-lines">
                    @if($about && $about->description)
                        {{ $about->description }}
                    @else
                        Zemovit was founded in London by a team with pharmaceutical backgrounds and one shared belief:
                        better health should be available to everyone. We serve both the public and clinical environments,
                        combining rigorous scientific standards with a commitment to wellness that's real, honest, and
                        forward-looking. Every Zemovit formula is built from proven, well-studied ingredients. And this is
                        only the beginning. Our upcoming range includes targeted blends based on the latest clinical
                        research—designed to fill the gaps the industry continues to overlook. We're not here to follow
                        what works. We're here to improve it. For people. For practitioners. For the future of
                        preventative health.
                    @endif
                </p>
            </div>
            <figure class="h-full relative imgDownUp">
                <img src="{{ $about && $about->image ? asset('storage/' . $about->image) : asset('site/img/a.jpg') }}"
                     class="img-cover"
                     alt="About Zemovit" />
            </figure>
        </div>
    </div>
</section>
