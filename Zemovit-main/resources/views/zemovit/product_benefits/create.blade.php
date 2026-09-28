{{--<div class="mb-3">--}}
{{--    {!! translateButton( ) !!}--}}
{{--</div>--}}
<form class="row g-3 from-submit-global" method="post" action="{{ $storeRoute }}" enctype="multipart/form-data">
    @csrf
    <!-- Add your form fields here -->
    @foreach (config('translatable.locales') as $locale)
        <div class="col-6 translation-group">
            <label for="TextInput" class="form-label">{{ __("zemovit.title") }} {{ getFieldLanguage($locale) }}</label>
            <input type="text" name="{{ $locale }}[title]" class="form-control translate-input"
                   @if($locale == 'ar')
                       data-validation="required , onlyArabic"
                   @else
                       data-validation="required , onlyEnglish"
                @endif

            >
        </div>
    @endforeach
    <div class="col-6">
        <label for="TextInput" class="form-label">{{ __("zemovit.products") }} </label>
        <select name="product_id" class="form-control" data-validation="required">
            <option value="">{{ __("zemovit.choose") }}</option>
            @foreach($products as $item)
                <option value="{{$item->id}}">{{ $item->{"title:en"} }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-12 modal-footer">
        {!! storeButton( $storeRoute ) !!}
        {!! closeButton() !!}
    </div>
</form>
