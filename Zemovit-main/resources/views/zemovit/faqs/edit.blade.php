<div class="mb-3">
    {!! translateButton( ) !!}
</div>


<form class="row g-3 from-submit-global" method="post" action="{{ $updateRoute }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <!-- Add your form fields here -->
    @foreach (config('translatable.locales') as $locale)
        <div class="col-6 translation-group">
            <label for="TextInput" class="form-label">{{ __("zemovit.title") }} {{ getFieldLanguage($locale) }}</label>
            <input type="text" name="{{ $locale }}[title]" class="form-control translate-input"
                   value="{{ $obj->translate($locale)->title }}"
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
            <label for="TextInput" class="form-label">{{ __("zemovit.description") }} {{ getFieldLanguage($locale) }}</label>
            <textarea name="{{ $locale }}[description]" class="form-control translate-input"  @if($locale == 'ar')
                data-validation="required , onlyArabic"
                      @else
                          data-validation="required , onlyEnglish"
                      @endif rows="5">{{ $obj->translate($locale)->description }}</textarea>
        </div>
    @endforeach

    <div class="col-12 modal-footer">
        {!! updateButton( $updateRoute ) !!}
        {!! closeButton() !!}
    </div>
</form>
