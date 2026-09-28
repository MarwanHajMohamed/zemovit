<header>
    <div class="container">
        <nav class="d-flex items-center justify-between py-10 px-9">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="w-80 ps-10">
                <img src="{{ setting('logo_header') !== null ? asset('storage').'/'.setting('logo_header') : asset('site/img/logo.svg') }}" alt="{{ __('site.logo_alt') }}" />
            </a>

            <!-- Language Switcher -->
            <!-- Navigation List -->
            <ul class="list d-flex lg:items-center border-none lg:relative m-0 gap-14 lg-max:flex-col lg-max:pt-14 lg-max:w-140 lg-max:max-w-full lg-max:h-screen"
                id="mobileList" popover="">
                <!-- Close Menu Button -->
                <button type="button"
                        class="btn btn-rounded btn-icon lg:d-none mx-6"
                        popovertarget="mobileList"
                        popovertargetaction="hide"
                        id="closeMenu">
                    <i class="fa-light fa-xmark"></i>
                </button>

                <!-- Navigation Items -->
                <li>
                    <a href="{{ route('home') }}#Hero"
                       class="{{ request()->routeIs('home') ? 'active' : '' }}">
                        {{ __('site.menu_items.home') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('about') }}"
                       class="{{ request()->routeIs('about') ? 'active' : '' }}">
                        {{ __('site.menu_items.about') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('therapeutic') }}"
                       class="{{ request()->routeIs('therapeutic') ? 'active' : '' }}">
                        {{ __('site.menu_items.therapeutic') }}
                    </a>
                </li>

                  <!-- <li>
                    <a href="{{ route('blog.index') }}"
                       class="{{ request()->routeIs('blog') ? 'active' : '' }}">
                        {{ __('site.menu_items.blog') }}
                    </a>
                </li> -->

                <li>
                    <a href="{{ route('site.products') }}"
                       class="{{ request()->routeIs('products*') ? 'active' : '' }}">
                        {{ __('site.menu_items.products') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact') }}"
                       class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                        {{ __('site.menu_items.contact') }}
                    </a>
                </li>
            </ul>

            <!-- Mobile Menu Toggle -->
            <menu class="d-flex items-center gap-8">
                <li class="lg:d-none">
                    <button class="btn btn-rounded isBorder btn-icon"
                            popovertarget="mobileList"
                            popovertargetaction="show"
                            id="openMenu">
                        <i class="fa-regular fa-bars"></i>
                    </button>
                </li>
            </menu>
        </nav>
    </div>
</header>
