<section class="therapeutic-sec" id="therapeutic">
        <div class="container">
            <div class="mainHeading center">
                <span class="subTitle fadeIn">{{home_setting(\App\Enums\SectionNamesEnum::TherapeuticArea)->title }}</span>
                <h2 class="split-text">
                    {{home_setting(\App\Enums\SectionNamesEnum::TherapeuticArea)->subtitle }} <span class="MainColor">{{home_setting(\App\Enums\SectionNamesEnum::TherapeuticArea)->subtitle2 }}</span>
                </h2>
            </div>
            <div class="services-grid">
                @forelse($therapeuticAreas as $area)
                    <a href="{{ route('site.products', ['category' => $area->slug ]) }}"  class="service-card" data-aos="zoom-in" data-aos-delay="{{ 200 + ($loop->index * 200) }}">
                        <div class="card-inner">
                            <div class="card-face card-front">
                                <div class="liquid-shape"></div>
                                <div class="service-meta">
                                    <div class="icon-container">
                                        <img  src="{{ asset('storage/' . $area->icon) }}" alt="{{ $area->title }} Icon" class="service-icon" />
                                        <div class="icon-halo"></div>
                                    </div>
                                    <h3>
                                        <h3> {{$area->title}}<br />{{$area->title2}}</h3>
                                    </h3>
                                    <div class="service-number">{{ str_pad($loop->index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                                </div>
                            </div>
                            <div class="card-face card-back">
                                <div class="back-content">
                                    <ul class="service-features">
                                        {!! $area->description !!}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <!-- Fallback static cards -->
                    <div class="service-card" data-aos="zoom-in" data-aos-delay="200">
                        <div class="card-inner">
                            <div class="card-face card-front">
                                <div class="liquid-shape"></div>
                                <div class="service-meta">
                                    <div class="icon-container">
                                        <img src="{{ asset('site/img/icon1.svg') }}" alt="Energy Icon" class="service-icon" />
                                        <div class="icon-halo"></div>
                                    </div>
                                    <h3>ENERGY &<br />METABOLISM</h3>
                                    <div class="service-number">01</div>
                                </div>
                            </div>
                            <div class="card-face card-back">
                                <div class="back-content">
                                    <ul class="service-features">
                                        <li>Enhance physical and mental energy</li>
                                        <li>Support metabolic function</li>
                                        <li>Reduce fatigue with bioavailable nutrients</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add other fallback cards similarly -->
                @endforelse
            </div>
        </div>
    </section>
