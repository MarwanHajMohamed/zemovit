<div class="mb-3">
    {!! translateButton( ) !!}
</div>


<form class="row g-3 from-submit-global" method="post" action="{{ $updateRoute }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <!-- Add your form fields here -->
    @foreach (config('translatable.locales') as $locale)
        <div class="col-6 translation-group">
            <label for="TextInput" class="form-label">{{ __("zemovit.label") }} {{ getFieldLanguage($locale) }}</label>
            <input type="text" name="{{ $locale }}[label]" class="form-control translate-input"
                   value="{{ $obj->translate($locale)->label }}"
                   @if($locale == 'ar')
                       data-validation="required , onlyArabic"
                   @else
                       data-validation="required , onlyEnglish"
                @endif
            >
        </div>
    @endforeach
    @foreach (config('translatable.locales') as $locale)
        <div class="col-6 translation-group">
            <label for="TextInput" class="form-label ">{{ __("zemovit.value") }} {{ getFieldLanguage($locale) }}</label>
            <input type="text" name="{{ $locale }}[value]" class="form-control translate-input"
                   value="{{ $obj->translate($locale)->value }}"
                   @if($locale == 'ar')
                       data-validation="required , onlyArabic"
                   @else
                       data-validation="required , onlyEnglish"
                @endif
            >
        </div>
    @endforeach
    <div class="col-6">
        <label for="TextInput" class="form-label">{{ __("zemovit.products") }}</label>
        <select name="product_id" class="form-control" data-validation="required">
            <option value="">{{ __("zemovit.choose") }}</option>
            @foreach($products as $item)
                <option value="{{ $item->id }}" {{ $item->id == $obj->product_id ? 'selected' : '' }}>
                    {{ $item->{"title:en"} }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-12 modal-footer">
        {!! updateButton( $updateRoute ) !!}
        {!! closeButton() !!}
    </div>
</form>
