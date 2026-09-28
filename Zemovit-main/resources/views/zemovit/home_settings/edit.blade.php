{{--<div class="mb-3">--}}
{{--    {!! translateButton( ) !!}--}}
{{--</div>--}}


<form class="row g-3 from-submit-global" method="post" action="{{ $updateRoute }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <!-- Add your form fields here -->
    <div class="col-md-6">
        <label class="form-label">{{ __("zemovit.section_name") }} </label>
        <input type="text" class="form-control"
               value="{{\App\Enums\SectionNamesEnum::tryFrom($obj->section_name)->lang()}}"
               readonly>
        <input type="hidden" name="section_name" value="{{$obj->section_name}}" hidden>
    </div>
    @if($obj->section_name == \App\Enums\SectionNamesEnum::WhyChooseUs->value)
    <div class="col-6">
        <label for="TextInput" class="form-label">{{ __("zemovit.is_show") }} </label>
        <select name="is_show" class="form-control" data-validation="required">
            <option value="">{{ __("zemovit.choose") }}</option>
            <option value="1" @selected($obj->is_show == '1')>{{ __("zemovit.yes") }}</option>
            <option value="0" @selected($obj->is_show == '0')>{{ __("zemovit.no") }}</option>
        </select>
    </div>
    @else
        <input value="1" name="is_show" hidden="">
    @endif
    @foreach (config('translatable.locales') as $locale)
        <div class="col-6 translation-group">
            <label for="TextInput"
                   class="form-label">{{ __("zemovit.title") }} {{ getFieldLanguage($locale) }}</label>
            <input type="text" name="{{ $locale }}[title]" class="form-control translate-input"
                   value="{{$obj->translate($locale)->title}}">
        </div>
    @endforeach
    @foreach (config('translatable.locales') as $locale)
        <div class="col-6 translation-group">
            <label for="TextInput"
                   class="form-label">{{ __("zemovit.subtitle1") }} {{ getFieldLanguage($locale) }}</label>
            <input type="text" name="{{ $locale }}[subtitle]" class="form-control translate-input"
                   value="{{$obj->translate($locale)->subtitle ?? ''}}">
        </div>
    @endforeach
    @if($obj->section_name != \App\Enums\SectionNamesEnum::AllProducts->value)
    @foreach (config('translatable.locales') as $locale)
        <div class="col-6 translation-group">
            <label for="TextInput"
                   class="form-label">{{ __("zemovit.subtitle2") }} {{ getFieldLanguage($locale) }}</label>
            <input type="text" name="{{ $locale }}[subtitle2]" class="form-control translate-input"
                   value="{{$obj->translate($locale)->subtitle2}}">
        </div>
    @endforeach
    @endif
@foreach (config('translatable.locales') as $locale)
        <div class="col-6 translation-group d-none">
            <label for="TextInput"
                   class="form-label">{{ __("zemovit.description") }} {{ getFieldLanguage($locale) }}</label>
            <textarea type="text" name="{{ $locale }}[description]" class="form-control translate-input">
                {{$obj->translate($locale)->description}}
            </textarea>
        </div>
    @endforeach
    @if(Auth::guard('admin')->user()->admin_type == \App\Enums\AdminTypeisEnum::Developer->value
//&& $obj->section_name == \App\Enums\SectionNamesEnum::WhyChooseUs->value
)
        <div class="col-12">
            <label for="TextInput" class="form-label">{{ __("zemovit.image") }}</label>
            <input type="file" name="image" class="dropify" data-default-file="{{ showFile($obj->image) }}">
        </div>
    @endif
    <div class="col-12 modal-footer">
        {!! updateButton( $updateRoute ) !!}
        {!! closeButton() !!}
    </div>
</form>
