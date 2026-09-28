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
            <label for="TextInput" class="form-label">{{ __("zemovit.description") }} {{ getFieldLanguage($locale) }}</label>
            <textarea name="{{ $locale }}[description]" class="form-control translate-input"
                      @if($locale == 'ar')
                          data-validation="required , onlyArabic"
                      @else
                          data-validation="required , onlyEnglish"
                @endif></textarea>

        </div>
    @endforeach
    <div class="col-6">
        <label for="TextInput" class="form-label">{{ __("zemovit.therapeutic_areas") }} </label>
        <select name="therapeutic_area_id[]" class="form-control select2" data-validation="required" multiple>
            <option value="">{{ __("zemovit.choose") }}</option>
            @foreach($therapeutic_areas as $item)
                <option value="{{$item->id}}">{{ $item->{"title:en" } }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-6">
        <label for="TextInput" class="form-label">{{ __("zemovit.is_feature") }} </label>
        <select name="is_featured" class="form-control" data-validation="required">
            <option value="0">{{ __("zemovit.no") }}</option>
            <option value="1">{{ __("zemovit.yes") }}</option>

        </select>
    </div>
    <div class="col-12">
        <label for="TextInput" class="form-label">{{ __("zemovit.image") }}</label>
        <input type="file" name="image" class="dropify" data-validation="required">
    </div>
    <!-- Benefits Table -->
    <label>benefits </label>
    <table class="table table-bordered">
        <thead>
        <tr>
            @foreach (config('translatable.locales') as $locale)
                <th>{{ __("zemovit.benefit_title") }} {{ getFieldLanguage($locale) }}</th>
            @endforeach
            <th>{{ __("zemovit.actions") }}</th>
        </tr>
        </thead>
        <tbody id="json_array_benefits" class="content"
               data-mfield-options='{"section": ".y-group-benefits","btnAdd":"#btnAdd-benefits","btnRemove":".btnRemove"}'>
        <tr class="y-group-benefits">
            @foreach (config('translatable.locales') as $locale)
                <td>
                    <input type="text" name="benefits[0][{{ $locale }}][title]" class="form-control index-plus">
                </td>
            @endforeach
            <td>
                <i class="fa fa-plus-circle" id="btnAdd-benefits"></i>
                <i class="fa fa-trash-o btnRemove"></i>
            </td>
        </tr>
        </tbody>
    </table>

    <!-- Features Table (or Second Benefits) -->
    <label>details</label>
    <table class="table table-bordered">
        <thead>
        <tr>
            @foreach (config('translatable.locales') as $locale)
                <th>{{ __("zemovit.detail_label") }} {{ getFieldLanguage($locale) }}</th>
                <th>{{ __("zemovit.detail_value") }} {{ getFieldLanguage($locale) }}</th>
            @endforeach
            <th>{{ __("zemovit.actions") }}</th>
        </tr>
        </thead>
        <tbody id="json_array_features" class="content"
               data-mfield-options='{"section": ".y-group-features","btnAdd":"#btnAdd-features","btnRemove":".btnRemove"}'>
        <tr class="y-group-features">
            @foreach (config('translatable.locales') as $locale)
                <td>
                    <input type="text" name="details[0][{{ $locale }}][label]" class="form-control index-plus">
                </td>
                <td>
                    <input type="text" name="details[0][{{ $locale }}][value]" class="form-control index-plus">
                </td>
            @endforeach
            <td>
                <i class="fa fa-plus-circle" id="btnAdd-features"></i>
                <i class="fa fa-trash-o btnRemove"></i>
            </td>
        </tr>
        </tbody>
    </table>



    <div class="col-12 modal-footer">
        {!! storeButton( $storeRoute ) !!}
        {!! closeButton() !!}
    </div>
</form>
<script>
    function loadJqerySelectors() {
        $.validate({
            ignore: 'input[type=hidden]',
            modules: 'date, security',
            lang: '{{ \App::currentLocale() }}',
            validateOnEvent: true
        });
        if ($('.dropify').length > 0) {
            $('.dropify').dropify();
        }
        if ($('#json_array_benefits').length > 0) {
            $('#json_array_benefits').multifield();
        }
        if ($('#json_array_features').length > 0) {
            $('#json_array_features').multifield();
        }
        if ($('input[data-role="tagsinput"]').length > 0) {
            $('input[data-role="tagsinput"]').each(function () {
                if (!$(this).hasClass('bootstrap-tagsinput-initialized')) {
                    $(this).tagsinput();
                    $(this).addClass('bootstrap-tagsinput-initialized');
                }
            });
        }
    }
</script>
