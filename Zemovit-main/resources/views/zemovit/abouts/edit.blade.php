{{--<div class="mb-3">--}}
{{--    {!! translateButton( ) !!}--}}
{{--</div>--}}


<form class="row g-3 from-submit-global" method="post" action="{{ $updateRoute }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <!-- Add your form fields here -->
    @foreach (config('translatable.locales') as $locale)
        <div class="col-6 translation-group">
            <label for="TextInput" class="form-label">{{ __("zemovit.title") }} {{ getFieldLanguage($locale) }}</label>
            <input type="text" name="{{ $locale }}[title]" class="form-control translate-input"
                   value="{{ $obj->translate($locale)->title ?? '' }}"
            >
        </div>
    @endforeach
    @foreach (config('translatable.locales') as $locale)
        <div class="col-6 translation-group">
            <label for="TextInput" class="form-label">{{ __("zemovit.subtitle1") }} {{ getFieldLanguage($locale) }}</label>
            <input type="text" name="{{ $locale }}[subtitle]" class="form-control translate-input"
                   value="{{ $obj->translate($locale)->subtitle ?? '' }}"
            >
        </div>
    @endforeach

    @foreach (config('translatable.locales') as $locale)
        <div class="col-6 translation-group">
            <label for="TextInput" class="form-label">{{ __("zemovit.subtitle2") }} {{ getFieldLanguage($locale) }}</label>
            <input type="text" name="{{ $locale }}[subtitle2]" class="form-control translate-input"
                   value="{{ $obj->translate($locale)->subtitle2 ?? '' }}"
            >
        </div>
    @endforeach

@foreach (config('translatable.locales') as $locale)
        <div class="col-6 translation-group">
            <label for="TextInput" class="form-label">{{ __("zemovit.description") }} {{ getFieldLanguage($locale) }}</label>
            <textarea name="{{ $locale }}[description]" class="form-control translate-input"

                       rows="5">{{ $obj->translate($locale)->description ?? '' }}</textarea>
        </div>
    @endforeach
    <div class="col-6  d-none">
        <label for="TextInput" class="form-label">{{ __("zemovit.is_show_in_home") }}</label>
        <select name="is_show" class="form-control" data-validation="required">
            <option value="0" {{ $obj->is_show == 0 ? 'selected' : '' }}>{{ __("zemovit.no") }}</option>
            <option value="1" {{ $obj->is_show == 1 ? 'selected' : '' }}>{{ __("zemovit.yes") }}</option>
        </select>
    </div>
    <div class="col-6">
        <label for="TextInput" class="form-label">{{ __("zemovit.image") }}</label>
        <input type="file" name="image" class="dropify" data-default-file="{{ showFile($obj->image) }}">
    </div>
    <div class="col-12 modal-footer">
        {!! updateButton( $updateRoute ) !!}
        {!! closeButton() !!}
    </div>
</form>
