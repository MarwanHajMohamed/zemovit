@extends('site.layouts.master')
@section('title')
    {{ 'All Products'  }}
@endsection
@section('content')
    @php($product_section = home_setting(\App\Enums\SectionNamesEnum::AllProducts))
    <div class="container">
        <div class="products-page">
            <!-- Sidebar with categories -->
            <aside class="sidebar">
                <h3>{{__('site.therapeutic')}}</h3>
                <ul class="categories-list">
                    <li>
                        <a href="{{ route('site.products', array_filter(['q' => $search])) }}" class="{{ $currentCategory === 'All' ? 'active' : '' }}" data-category="All">
                            {{$product_section->title ?? 'All Products' }}
                           </a>
                       </li>
                       @foreach($categories as $category)
                           <li>
                               <a href="{{ route('site.products', array_filter(['category' => $category->slug, 'q' => $search])) }}"
                               class="{{ $currentCategory === $category->slug ? 'active' : '' }}"
                               data-category="{{ $category->title }}">
                                {{ $category->title .' '. $category->title2}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>

            <!-- Products Grid -->
            <div class="products-grid">
                <div class="products-header">
                    <!-- <h2>{{ $currentCategory === 'All' ? ($product_section->title ?? 'All Products') : $currentCategory }}</h2> -->
                    <p>
                        {{$product_section->subtitle ?? 'Browse our complete range of high-quality supplements'}}

                    </p>
                </div>

                <form method="GET" action="{{ route('site.products') }}" class="products-search" role="search">
                    @if($currentCategory !== 'All')
                        <input type="hidden" name="category" value="{{ $currentCategory }}">
                    @endif
                    <input type="search" name="q" value="{{ $search }}" placeholder="{{ __('site.search_products') }}" aria-label="{{ __('site.search_products') }}">
                    <button type="submit" class="btn">{{ __('site.search') }}</button>
                    @if($search !== '')
                        <a href="{{ route('site.products', $currentCategory !== 'All' ? ['category' => $currentCategory] : []) }}" class="products-search-clear">{{ __('site.clear_search') }}</a>
                    @endif
                </form>

                @if($products->isEmpty())
                    <p class="products-empty">{{ __('site.no_products_found') }}</p>
                @endif

                <div class="products-container">
                    @foreach($products as $product)
                        <div class="product-card" data-category="">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->translations->first()->title }}" />
                            <div class="product-card-content">
                                <h3>{{ $product->translations->first()->title }}</h3>
                                <p>{{ Str::limit($product->translations->first()->description, 100) }}</p>
                                <a href="{{ route('site.products.show', $product->translations->first()->slug) }}" class="btn">View Details</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
