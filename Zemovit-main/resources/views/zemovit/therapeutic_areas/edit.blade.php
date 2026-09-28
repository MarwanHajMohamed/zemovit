{{--<div class="mb-3">--}}
{{--    {!! translateButton( ) !!}--}}
{{--</div>--}}
<form class="row g-3 from-submit-global" method="post" action="{{ $updateRoute }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <!-- Add your form fields here -->
    @foreach (config('translatable.locales') as $locale)
        <div class="col-12 translation-group">
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
        <div class="col-12 translation-group">
            <label for="TextInput" class="form-label">{{ __("zemovit.title2") }} {{ getFieldLanguage($locale) }}</label>
            <input type="text" name="{{ $locale }}[title2]" class="form-control translate-input"
                   value="{{ $obj->translate($locale)->title2 }}"
                   @if($locale == 'ar')
                       data-validation="required , onlyArabic"
                   @else
                       data-validation="required , onlyEnglish"
                @endif
            >
        </div>
    @endforeach
    @foreach (config('translatable.locales') as $locale)
        <div class="col-12 translation-group">
            <label for="TextInput" class="form-label">{{ __("zemovit.description") }} {{ getFieldLanguage($locale) }}</label>
            <textarea name="{{ $locale }}[description]" class="form-control translate-input mytextarea"  @if($locale == 'ar')
                data-validation="required , onlyArabic"
                      @else
                          data-validation="required , onlyEnglish"
                      @endif rows="5">{{ $obj->translate($locale)->description }}</textarea>
        </div>
    @endforeach
    <div class="col-12">
        <label for="TextInput" class="form-label">{{ __("zemovit.icon") }}</label>
        <input type="file" name="icon" class="dropify" data-default-file="{{ showFile($obj->icon) }}">
    </div>

    <div class="col-12 modal-footer">
        {!! updateButton( $updateRoute ) !!}
        {!! closeButton() !!}
    </div>
</form>
<script>
    $(document).ready(function () {
        tinymce.init({
            selector: '.mytextarea',
            plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    });
</script>
