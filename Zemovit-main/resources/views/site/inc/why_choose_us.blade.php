@php
    $whyChooseUsItems = collect([
        [
            'title' => 'Scientifically Backed Formulas',
            'description' => 'Every supplement we offer is developed with input from certified nutritionists and backed by real clinical research to ensure safety and results.',
        ],
        [
            'title' => 'Clean & Natural Ingredients',
            'description' => 'We use only high-quality, non-GMO, and additive-free ingredients to give your body the pure fuel it deserves — no fillers, no fakes.',
        ],
        [
            'title' => 'Third-Party Tested for Purity',
            'description' => 'Our products go through rigorous independent lab testing to ensure you\'re getting exactly what\'s on the label — and nothing you don\'t want.',
        ],
        [
            'title' => 'Tailored for Real Results',
            'description' => 'Whether your goal is to gain muscle, boost energy, enhance focus, or support immunity — we have a product designed to help you get there.',
        ],
        [
            'title' => 'Fast & Reliable Delivery',
            'description' => 'We process your orders quickly and offer reliable shipping options to ensure your supplements reach you on time, every time.',
        ],
        [
            'title' => 'Dedicated Support Team',
            'description' => 'Our experts are always ready to answer your questions, offer guidance, and help you make informed choices for your health.',
        ]
    ]);
    $result = count($whyChooseUs) == 0 ? $whyChooseUsItems : $whyChooseUs;
@endphp
@php($why = home_setting(\App\Enums\SectionNamesEnum::WhyChooseUs))
<section class="why" id="Why">
    <div class="mainHeading center">
        <span class="subTitle fadeIn">{{ $why->title ?? 'Why'}}</span>
        <h2 class="split-text">
            {{ $why->subtitle ?? 'Why Choose'}} <span class="MainColor">{{ $why->subtitle2 ?? 'Zemovit'}}</span>
        </h2>
    </div>
        <div class="container d-grid lg:grid-col-3 grid-col-1 h-full gap-8 items-center">
            <div class="whyItems">
                @foreach($result->take(2) as $it)
                    <div class="item fadeIn p-10 px-12">
                        <h3>{{ $it['title'] }}</h3>
                        <p class="split-lines">
                            {{ $it['description'] }}
                        </p>
                    </div>
                @endforeach
            </div>
            <figure class="imgDownUp">
                @if(!$why->image || $why->image == "img/why.jpg")
                <img src="{{asset('site')}}/img/Why choose us (2).svg" class="" alt="why" />
                @else
                    <img src="{{asset('storage') .'/' . $why->image }}" class="" alt="why" />
                @endif
            </figure>
            <div class="whyItems">
                @foreach($result->slice(2) as $it)
                    <div class="item fadeIn p-10 px-12">
                        <h3>{{ $it['title'] }}</h3>
                        <p class="split-lines">
                            {{ $it['description'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
</section>
