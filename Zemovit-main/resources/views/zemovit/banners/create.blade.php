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
            <label for="TextInput" class="form-label">{{ __("zemovit.description") }} {{ getFieldLanguage($locale) }}</label>
            <textarea name="{{ $locale }}[description]" class="form-control translate-input"
                      @if($locale == 'ar')
                          data-validation="required , onlyArabic"
                      @else
                          data-validation="required , onlyEnglish"
                @endif></textarea>

        </div>
    @endforeach
    <div class="col-md-6">
        <label for="btn_link" class="form-label">{{__('zemovit.btn_link')}}<span class="text-danger">*</span></label>
        <input type="file" name="image" id="image" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label for="image" class="form-label">{{__('zemovit.image')}}<span class="text-danger">*</span></label>
        <input type="file" name="image" id="image" class="form-control" required>
    </div>

    <div class="col-12 modal-footer">
        {!! storeButton( $storeRoute ) !!}
        {!! closeButton() !!}
    </div>
</form>
