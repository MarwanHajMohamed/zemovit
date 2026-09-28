
{{--<div class="mb-3">--}}
{{--    {!! translateButton( ) !!}--}}
{{--</div>--}}

<form class="row g-3 from-submit-global" method="post" action="{{ $storeRoute }}" enctype="multipart/form-data">
    @csrf
    <!-- Add your form fields here -->
    <div class="col-6">
        <label for="TextInput" class="form-label">{{ __("zemovit.section_name") }} </label>
        <select name="section_name" class="form-control" data-validation="required">
            <option value="">{{ __("zemovit.choose") }}</option>
            @foreach($section_names as $section_name)
                @if(!in_array($section_name->value , $usedSectionNames)
//&& !in_array($section_name->value,[\App\Enums\SectionNamesEnum::AllProducts->value,\App\Enums\SectionNamesEnum::Contact->value,\App\Enums\SectionNamesEnum::Faq->value])
)
                    <option
                        value="{{$section_name->value}}">{{\App\Enums\SectionNamesEnum::tryFrom($section_name->value)->lang()}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="col-6">
        <label for="TextInput" class="form-label">{{ __("zemovit.is_show") }} </label>
        <select name="is_show" class="form-control" data-validation="required">
            <option value="">{{ __("zemovit.choose") }}</option>
            <option value="1">{{ __("zemovit.yes") }}</option>
            <option value="0">{{ __("zemovit.no") }}</option>
        </select>
    </div>
    @foreach (config('translatable.locales') as $locale)
        <div class="col-6 translation-group">
            <label for="TextInput" class="form-label">{{ __("zemovit.title") }} {{ getFieldLanguage($locale) }}</label>
            <input type="text" name="{{ $locale }}[title]" class="form-control translate-input">
        </div>
    @endforeach
    @foreach (config('translatable.locales') as $locale)
        <div class="col-6 translation-group">
            <label for="TextInput" class="form-label">{{ __("zemovit.subtitle1") }} {{ getFieldLanguage($locale) }}</label>
            <input type="text" name="{{ $locale }}[subtitle]" class="form-control translate-input">
        </div>
    @endforeach

    @foreach (config('translatable.locales') as $locale)
        <div class="col-6 translation-group">
            <label for="TextInput" class="form-label">{{ __("zemovit.subtitle2") }} {{ getFieldLanguage($locale) }}</label>
            <input type="text" name="{{ $locale }}[subtitle2]" class="form-control translate-input">
        </div>
    @endforeach

@foreach (config('translatable.locales') as $locale)
        <div class="col-6 translation-group d-none">
            <label for="TextInput"
                   class="form-label">{{ __("zemovit.description") }} {{ getFieldLanguage($locale) }}</label>
            <textarea type="text" name="{{ $locale }}[description]" class="form-control translate-input">
                ewweggrgregergregregr
            </textarea>
        </div>
    @endforeach
    @if(Auth::guard('admin')->user()->admin_type == \App\Enums\AdminTypeisEnum::Developer->value)
        <div class="col-12">
            <label for="TextInput" class="form-label">{{ __("zemovit.image") }}</label>
            <input type="file" name="image" class="dropify" >
        </div>
    @endif
    <div class="col-12 modal-footer">
        {!! storeButton( $storeRoute ) !!}
        {!! closeButton() !!}
    </div>
</form>
