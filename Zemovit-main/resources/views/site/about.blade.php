
@extends('site.layouts.master')
@section('title')
    {{ 'About Page'  }}
@endsection
@section('content')
    <main>
        <!-- About Us -->
        <section class="about" id="About">
            <div class="container h-full">
                @if(count($abouts) > 0)
                    @foreach($abouts as $index => $translation)
                        @php
                            $image = $translation->image;
                            $isEven = $index % 2 === 0;
                        @endphp

                            <!-- about compony -->
                        <div class="d-grid grid-col-1 lg:grid-col-2 h-full gap-14 items-center mb-14">
                            @if($isEven)
                                <div class="aboutContent lg-max:row-s-2 lg-max:row-e-2">
                                    <div class="mainHeading smallGap">
                                        <span class="subTitle fadeIn">{{ $translation->title ?? '' }}</span>
                                        <h2 class="split-text">
                                            {{$translation->subtitle}} <span class="MainColor">{{$translation->subtitle2}}</span>
                                        </h2>
                                    </div>
                                    <p class="aboutOverview line-relaxed split-lines">
                                        {{ $translation->description }}
                                    </p>
                                </div>
                                <figure class="h-full relative imgDownUp">
                                    <img src="{{ asset('storage/' . $image) }}" class="img-cover" alt="about" />
                                </figure>
                            @else
                                <div class="aboutContent order-2">
                                    <div class="mainHeading smallGap">
                                        <span class="subTitle fadeIn">{{ $translation->title ?? '' }}</span>
                                        <h2 class="split-text">{{ $translation->subtitle }}
                                            <span class="MainColor">{{$translation->subtitle2 ?? ''}}</span>
                                        </h2>
                                    </div>
                                    <p class="aboutOverview line-relaxed split-lines">
                                        {{ $translation->description }}
                                    </p>
                                </div>
                                <figure class="h-full relative imgDownUp">
                                    <img src="{{ asset('storage/' . $image) }}" class="img-cover" alt="mission" />
                                </figure>
                            @endif
                        </div>
                    @endforeach
                @else
                    <div
                        class="d-grid grid-col-1 lg:grid-col-2 h-full gap-14 items-center mb-14"
                    >
                        <div class="aboutContent lg-max:row-s-2 lg-max:row-e-2">
                            <div class="mainHeading smallGap">
                                <span class="subTitle fadeIn">About Us</span>
                                <h2 class="split-text">
                                    Who are <span class="MainColor">Zemovit</span>
                                </h2>
                            </div>
                            <p class="aboutOverview line-relaxed split-lines">
                                Zemovit was founded in London by a team with pharmaceutical
                                backgrounds and one shared belief: better health should be
                                available to everyone. We serve both the public and clinical
                                environments, combining rigorous scientific standards with a
                                commitment to wellness that’s real, honest, and forward-looking.
                                Every Zemovit formula is built from proven, well-studied
                                ingredients. And this is only the beginning. Our upcoming range
                                includes targeted blends based on the latest clinical
                                research—designed to fill the gaps the industry continues to
                                overlook. We’re not here to follow what works. We’re here to
                                improve it. For people. For practitioners. For the future of
                                preventative health.
                            </p>
                        </div>
                        <figure class="h-full relative imgDownUp">
                            <img src="{{asset('site')}}/img/a.jpg" class="img-cover" alt="about" />
                        </figure>
                    </div>
                @endif
                <!-- Mission -->
     <div
            class="d-grid grid-col-1 lg:grid-col-2 h-full gap-14 items-center mb-14"
          >
            <div class="aboutContent order-2">
              <div class="mainHeading smallGap">
                @if(isset($mission)&& isset($mission->title))
                    <span class="subTitle fadeIn">{{$mission->title ?? ''}}</span>
                @else
                    <span class="subTitle fadeIn">Our Mission</span>
                @endif
                     @if(isset($mission)&& isset($mission->sub_title))
                    <h2 class="split-text">{{$mission->sub_title ?? ''}}</h2>
                @else
                 <h2 class="split-text">Serving Your Health from Lab to Life</h2>
                @endif
              </div>
               <p class="aboutOverview line-relaxed split-lines">
                @if(isset($mission)&& isset($mission->description))
                   {{$mission->description ?? ''}}
                    @else
                At Zemovit, we make wellness accessible by combining
                clinical-grade science with the time-tested power of natural
                medicine. Rooted in tradition but built for today, our clean,
                high-quality supplements are already trusted in clinical
                environments and crafted to support everyday health — from bone
                strength to immunity, energy, and prenatal care. We don’t follow
                trends. We standardise what works, for everyone.
                @endif
              </p>
            </div>
            <figure class="h-full relative imgDownUp">
                @if(isset($mission)&& isset($mission->image))
                    <img src="{{ showfile($mission->image) }}" class="img-cover" alt="mission" />
                    @else
              <img src="{{asset('site')}}/img/a79ed803-f744-42a2-a37c-cecb0d9c9c47.jpg" class="img-cover" alt="mission" />
              @endif
            </figure>
           </div>
          <!-- Vision -->
          <div
            class="d-grid grid-col-1 lg:grid-col-2 h-full gap-2 items-center mb-14"
          >
            <div class="aboutContent lg-max:row-s-6 lg-max:row-e-6">
              <div class="mainHeading smallGap">
                <span class="subTitle fadeIn">
                    @if(isset($vision)&& isset($vision->title))
                        {{$vision->title ?? ''}}
                    @else
                        Our Vision
                    @endif
                 </span>
                <h2 class="split-text">
                    @if(isset($vision)&& isset($vision->sub_title))
                        {{$vision->sub_title ?? ''}}
                    @else
                    A Healthier Tomorrow for Everyone
                    @endif
                </h2>
              </div>
              <p class="aboutOverview line-relaxed split-lines">
                @if(isset($vision)&& isset($vision->description))
                    <!-- {!!$vision->description ?? ''!!} -->

                     {{$vision->description ?? ''}}
                    @else
                Our vision is to lead the transformation of the healthcare
                industry in the region. We aim to extend our impact to every
                household needing reliable health support. Innovation is our key
                to sustainable wellness. We strive to build a brand rooted in
                trust, quality, and future-forward thinking.
                @endif
              </p>
            </div>
            <figure class="h-full relative imgDownUp">
                @if(isset($vision)&& isset($vision->image))
                    <img src="{{ showfile($vision->image) }}" class="img-cover" alt="mission" />
                    @else
              <img src="{{asset('site')}}/img/22c9a5e2-ef22-4a60-bb60-79aa66115435.jpg" class="img-cover" alt="mission" />
              @endif
            </figure>
          </div>
            </div>
        </section>
        
    </main>
@endsection
