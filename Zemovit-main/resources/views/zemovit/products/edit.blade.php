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
    <div class="col-6">
        <label for="TextInput" class="form-label">{{ __("zemovit.therapeutic_areas") }}</label>
        <select name="therapeutic_area_id[]" class="form-control select2" data-validation="required" multiple>
            <option value="">{{ __("zemovit.choose") }}</option>
            @foreach($therapeutic_areas as $item)
                <option value="{{ $item->id }}" {{ in_array($item->id, $obj->therapeuticAreas->pluck('id')->toArray()) ? 'selected' : '' }} >
                    {{  $item->{"title:en"}  }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-6">
        <label for="TextInput" class="form-label">{{ __("zemovit.is_feature") }}</label>
        <select name="is_featured" class="form-control" data-validation="required">
            <option value="0" {{ $obj->is_featured == 0 ? 'selected' : '' }}>{{ __("zemovit.no") }}</option>
            <option value="1" {{ $obj->is_featured == 1 ? 'selected' : '' }}>{{ __("zemovit.yes") }}</option>
        </select>
    </div>


    <div class="col-12">
        <label for="TextInput" class="form-label">{{ __("image") }}</label>
        <input type="file" name="image" class="dropify" data-default-file="{{ showFile($obj->image) }}">
    </div>
    <!-- Benefits Table -->
    <label>{{ __("zemovit.benefits") }}</label>
    <table class="table table-bordered">
        <thead>
        <tr>
            @foreach(config('translatable.locales') as $locale)
                <th>{{ __("zemovit.benefit_title") }} {{ getFieldLanguage($locale) }}</th>
            @endforeach
            <th>{{ __("zemovit.actions") }}</th>
        </tr>
        </thead>
        <tbody id="json_array_benefits" class="content"
               data-mfield-options='{"section": ".y-group-benefits","btnAdd":"#btnAdd-benefits","btnRemove":".btnRemove"}'>
        @if(isset($obj->benefits) && count($obj->benefits) > 0)
            @foreach($obj->benefits as $index => $benefit)
                <tr class="y-group-benefits">
                    @foreach(config('translatable.locales') as $locale)
                        <td>
                            <input type="text" name="benefits[{{ $index }}][{{ $locale }}][title]" class="form-control index-plus"
                                   value="{{ $benefit->translate($locale)->title ?? '' }}"
                                   >
                        </td>
                    @endforeach
                    <td>
                        <i class="fa fa-plus-circle" id="btnAdd-benefits"></i>
                        <i class="fa fa-trash-o btnRemove"></i>
                    </td>
                </tr>
            @endforeach
        @else
            <tr class="y-group-benefits">
                @foreach(config('translatable.locales') as $locale)
                    <td>
                        <input type="text" name="benefits[0][{{ $locale }}][title]" class="form-control index-plus"
                               >
                    </td>
                @endforeach
                <td>
                    <i class="fa fa-plus-circle" id="btnAdd-benefits"></i>
                    <i class="fa fa-trash-o btnRemove"></i>
                </td>
            </tr>
        @endif
        </tbody>
    </table>

    <!-- Details Table -->
    <label>{{ __("zemovit.details") }}</label>
    <table class="table table-bordered">
        <thead>
        <tr>
            @foreach(config('translatable.locales') as $locale)
                <th>{{ __("zemovit.detail_label") }} {{ getFieldLanguage($locale) }}</th>
                <th>{{ __("zemovit.detail_value") }} {{ getFieldLanguage($locale) }}</th>
            @endforeach
            <th>{{ __("zemovit.actions") }}</th>
        </tr>
        </thead>
        <tbody id="json_array_details" class="content"
               data-mfield-options='{"section": ".y-group-details","btnAdd":"#btnAdd-details","btnRemove":".btnRemove"}'>
        @if(isset($obj->details) && count($obj->details) > 0)
            @foreach($obj->details as $index => $detail)
                <tr class="y-group-details">
                    @foreach(config('translatable.locales') as $locale)
                        <td>
                            <input type="text" name="details[{{ $index }}][{{ $locale }}][label]" class="form-control index-plus"
                                   value="{{ $detail->translate($locale)->label ?? '' }}"
                                   >
                        </td>
                        <td>
                            <input type="text" name="details[{{ $index }}][{{ $locale }}][value]" class="form-control index-plus"
                                   value="{{ $detail->translate($locale)->value ?? '' }}">
                        </td>
                    @endforeach
                    <td>
                        <i class="fa fa-plus-circle" id="btnAdd-details"></i>
                        <i class="fa fa-trash-o btnRemove"></i>
                    </td>
                </tr>
            @endforeach
        @else
            <tr class="y-group-details">
                @foreach(config('translatable.locales') as $locale)
                    <td>
                        <input type="text" name="details[0][{{ $locale }}][label]" class="form-control index-plus"
                               >
                    </td>
                    <td>
                        <input type="text" name="details[0][{{ $locale }}][value]" class="form-control index-plus"
                               >
                    </td>
                @endforeach
                <td>
                    <i class="fa fa-plus-circle" id="btnAdd-details"></i>
                    <i class="fa fa-trash-o btnRemove"></i>
                </td>
            </tr>
        @endif
        </tbody>
    </table>

    <div class="col-12 modal-footer">
        {!! updateButton( $updateRoute ) !!}
        {!! closeButton() !!}
    </div>
</form>
