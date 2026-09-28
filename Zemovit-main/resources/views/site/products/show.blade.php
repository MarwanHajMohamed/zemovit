@extends('site.layouts.master')
@section('title')
    {{ $product->title ?? 'All Products'  }}
@endsection
@section('content')
    <section class="product-details">
        <div class="container">
            <div class="product-header">
                <div class="product-image">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->translations->first()->title }}" />
                </div>

                <div class="product-basic-info">
                    <h1 class="product-title">{{ $product->title }}</h1>
                    <p class="product-description">
                        {{ $product->description }}
                    </p>
                    @if($product->benefits->count() > 0)
                    <h3 class="section-title">{{__('site.key_benefits')}}</h3>
                    <ul class="benefits-list">
                        @foreach($product->benefits as $benefit)
                            <li>{{ $benefit->translations->first()->title }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
            @if($product->details->count() > 0)
            <div class="product-content">
                <h3 class="section-title">{{__('site.product_details')}}</h3>
                <ul class="details-list">
                    @foreach($product->details ?? [] as $detail)
                        <li><strong>{{ $detail->label }}:</strong> {{ $detail->value }}</li>
                    @endforeach
                </ul>

{{--                <div class="warnings-box">--}}
{{--                    <h3 class="section-title">{{__('site.warnings')}}</h3>--}}
{{--                    <ul class="warnings-list">--}}
{{--                        @foreach($product->warnings as $warning)--}}
{{--                            <li>{{ $warning->title }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
            </div>
            @endif
        </div>
    </section>
@endsection
