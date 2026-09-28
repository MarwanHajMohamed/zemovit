<footer>
    <div class="container d-grid lg:grid-col-3 md:grid-col-2 grid-col-1">
        <!-- Footer Meta -->
        <div class="footerMeta">
            <figure class="w-140">
                <img src="{{  setting('logo_footer') ?  asset('storage').'/'.setting('logo_footer') : asset('site/img/logoW.svg') }}" alt="{{ __('site.logo_alt') }}" loading="lazy" />
            </figure>
            @if( setting('footer_text') !== null )
            <p class="line-relaxed my-9">
                {{setting('footer_text')}}
{{--                {{ __('site.tagline') }}--}}
            </p>
            @else
                <p class="line-relaxed my-9">
                    {{setting('footer_text')}}
                </p>
            @endif
            <menu class="socialLinks d-flex align-items-center gap-7 flex-wrap">
                <li>
                    <button type="button" class="btn btn-rounded">
                        <a href="{{ setting('facebook') ?? '#!' }}" target="_blank" rel="noopener">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    </button>
                </li>
                <li>
                    <button type="button" class="btn btn-rounded">
                        <a href="{{ setting('twitter')  ?? '#!' }}" target="_blank" rel="noopener">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </button>
                </li>
                <li>
                    <button type="button" class="btn btn-rounded">
                        <a href="{{ setting('instagram')  ?? '#!' }}" target="_blank" rel="noopener">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </button>
                </li>
                <li>
                    <button type="button" class="btn btn-rounded">
                        <a href="{{setting('tiktok')}} ?? #!" target="_blank" rel="noopener">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                    </button>
                </li>
            </menu>
        </div>

        <!-- Quick Links -->
        <div class="footerLinks">
            <h3>{{ __('auth.quick_links') }}</h3>
            <ul class="d-flex flex-col gap-10">
                <li><a href="{{ route('home') }}#hero">{{ __('site.menu_items.home') }}</a></li>
                <li><a href="{{ route('about') }}">{{ __('site.menu_items.about') }}</a></li>
                <li><a href="{{ route('therapeutic') }}">{{ __('site.menu_items.therapeutic') }}</a></li>
                <li><a href="{{ route('home') }}#Why">{{ __('site.why-choose-us') }}</a></li>
                <li><a href="{{ route('site.products') }}">{{ __('site.menu_items.products') }}</a></li>
            </ul>
        </div>

        <!-- Contact Info -->
        <div class="footerLinks">
            <h3>{{ __('site.contact_us') }}</h3>
            <ul class="d-flex flex-col gap-10">
                <li>
                    <a href="mailto:{{ $settings->email ?? 'info@zemovit.com' }}"
                       class="d-flex align-items-center gap-3">
                        <i class="fa-light fa-envelope"></i>
                        {{ setting('email') ?? 'info@zemovit.com' }}
                    </a>
                </li>
                <li>
                    <a href="tel:{{ setting('phone') ?? '+966500000000' }}"
                       class="d-flex align-items-center gap-3">
                        <i class="fa-light fa-phone"></i>
                        {{ setting('phone')?? '+966 50 000 0000' }}
                    </a>
                </li>

                  <li>
                    <a href="https://www.google.com/maps/dir//51.5275,-0.2720278/@51.5275,-0.2720278,17z?entry=ttu&g_ep=EgoyMDI1MTAxNC4wIKXMDSoASAFQAw%3D%3D"
                       class="d-flex align-items-center gap-3">
                        <i class="fas fa-map-marker-alt"></i>
                        Park Royal, London NW10 7PA, UK
                    </a>
                </li>

                 <!-- <li><i class=""></i> Unit 19, Metro Centre, Britannia Way, London NW10 7PA, United Kingdom.</li> -->

                <!-- @if(setting('other_phone') !== null && setting('other_phone') !== '#')
                    <li>
                        <a href="tel:{{ setting('other_phone')  }}"
                           class="d-flex align-items-center gap-3">
                            <i class="fa-light fa-phone"></i>
                            {{ setting('other_phone')  }}
                        </a>
                    </li>
                @endif -->
            </ul>
        </div>
    </div>

    <!-- Copyright -->
    <div class="copyRight border-t-1 border-t-solid">
        @if(setting('copyright') !== null)
            <p> {{setting('copyright')}} </p>
        @elseif(setting('copyright') == null)
            <p>{{  __('site.copyright') }} © {{ date('Y') }} Zemovit</p>
        @endif

    </div>
</footer>
