<div class="mb-3">
    {!! translateButton( ) !!}
</div>
<form class="row g-3 from-submit-global" method="post" action="{{ $updateRoute }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <!-- Add your form fields here -->
    <div class="col-md-4">
        <label class="form-label">{{ __("zemovit.page_name") }} </label>
        <input type="text" class="form-control" value="{{\App\Enums\PageNameTypeisEnum::tryFrom($obj->name)->lang()}}"
               readonly>
        <input type="hidden" name="name" value="{{$obj->name}}" hidden>
    </div>
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
    </div>
    @foreach (config('translatable.locales') as $locale)
        <div class="col-6 translation-group">
            <label for="TextInput" class="form-label">{{ __("zemovit.title") }} {{ getFieldLanguage($locale) }}</label>
            <input type="text" name="{{ $locale }}[title]" class="form-control translate-input"
                   @if($locale == 'ar')
                       data-validation="required , onlyArabic"
                   @else
                       data-validation="required , onlyEnglish"
                   @endif value="{{$obj->seoSettings->translate($locale)->title}}">
        </div>
    @endforeach
    @foreach (config('translatable.locales') as $locale)
        <div class="col-6 translation-group">
            <label for="TextInput"
                   class="form-label">{{ __("zemovit.description") }} {{ getFieldLanguage($locale) }}</label>
            <textarea type="text" name="{{ $locale }}[description]" class="form-control translate-input"
                      @if($locale == 'ar')
                          data-validation="required , onlyArabic"
                      @else
                          data-validation="required , onlyEnglish"
                @endif >
                {{$obj->seoSettings->translate($locale)->description}}
            </textarea>
        </div>
    @endforeach
    <div>
        {!! generateKeywordsButton( ) !!}
    </div>
    @foreach (config('translatable.locales') as $locale)
        <div class="col-6">
            <label for="{{ $locale }}[tags]"
                   class="form-label">{{ helperTrans("zemovit.keywords") }} {{ getFieldLanguage($locale) }}</label>
            <input type="text" id="{{ $locale }}[keywords]" name="{{ $locale }}[keywords]" class="form-control"
                   data-role="tagsinput"
                   @if($locale == 'ar')
                       data-validation="required , onlyArabic"
                   @else
                       data-validation="required , onlyEnglish"
                   @endif value="{{$obj->seoSettings->translate($locale)->keywords}}">
        </div>
    @endforeach
    <div class="col-12">
        <label for="TextInput" class="form-label">{{ __("zemovit.image") }}</label>
        <input type="file" name="image" class="dropify" data-default-file="{{ showFile($obj->seoSettings->image) }}">
    </div>
    <div class="col-12 modal-footer">
        {!! updateButton( $updateRoute ) !!}
        {!! closeButton() !!}
    </div>
</form>
