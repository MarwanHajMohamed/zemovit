
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
    @foreach (config('translatable.locales') as $locale)
        <div class="col-6 translation-group">
            <label for="TextInput" class="form-label">{{ __("zemovit.subtitle1") }} {{ getFieldLanguage($locale) }}</label>
            <textarea name="{{ $locale }}[subtitle]" class="form-control translate-input"
                      @if($locale == 'ar')
                          data-validation="required , onlyArabic"
                      @else
                          data-validation="required , onlyEnglish"
                @endif></textarea>

        </div>
    @endforeach
    @foreach (config('translatable.locales') as $locale)
        <div class="col-6 translation-group">
            <label for="TextInput" class="form-label">{{ __("zemovit.subtitle2") }} {{ getFieldLanguage($locale) }}</label>
            <textarea name="{{ $locale }}[subtitle2]" class="form-control translate-input"
                      @if($locale == 'ar')
                          data-validation="required , onlyArabic"
                      @else
                          data-validation="required , onlyEnglish"
                @endif></textarea>

        </div>
    @endforeach


@foreach (config('translatable.locales') as $locale)
        <div class="col-6 translation-group">
            <label for="TextInput" class="form-label">{{ __("zemovit.description") }} {{ getFieldLanguage($locale) }}</label>
            <textarea name="{{ $locale }}[description]" class="form-control translate-input"
                      @if($locale == 'ar')
                          data-validation="required , onlyArabic"
                      @else
                          data-validation="required , onlyEnglish"
                @endif></textarea>

        </div>
    @endforeach
    <div class="col-6 d-none" >
        <label for="TextInput" class="form-label">{{ __("zemovit.is_show_in_home") }} </label>
        <select name="is_show" class="form-control" data-validation="required">
            <option value="0">{{ __("zemovit.no") }}</option>
            <option value="1">{{ __("zemovit.yes") }}</option>

        </select>
    </div>
    <div class="col-md-6">
        <label for="image" class="form-label">{{__('zemovit.image')}}<span class="text-danger">*</span></label>
        <input type="file" name="image" id="image" class="form-control"  data-validation="required">
    </div>
    <div class="col-12 modal-footer">
        {!! storeButton( $storeRoute ) !!}
        {!! closeButton() !!}
    </div>
</form>
