{{--<div class="mb-3">--}}
{{--    {!! translateButton( ) !!}--}}
{{--</div>--}}


<form class="row g-3 from-submit-global" method="post" action="{{ $updateRoute }}" enctype="multipart/form-data">
    @csrf
    @method('put')

    {{-- Title Fields --}}
    @foreach (config('translatable.locales') as $locale)
        <div class="col-6 translation-group">
            <label class="form-label">{{ __("zemovit.title") }} {{ getFieldLanguage($locale) }}</label>
            <input type="text" 
                   name="{{ $locale }}[title]" 
                   class="form-control translate-input"
                   value="{{ $obj->translate($locale)->title }}"
                   @if($locale == 'ar')
                       data-validation="required , onlyArabic"
                   @else
                       data-validation="required , onlyEnglish"
                   @endif>
        </div>
    @endforeach

    {{-- Description Fields --}}
    @foreach (config('translatable.locales') as $locale)
        <div class="col-6 translation-group">
            <label class="form-label">{{ __("zemovit.description") }} {{ getFieldLanguage($locale) }}</label>
            <textarea name="{{ $locale }}[description]" 
                      class="form-control translate-input"
                      rows="4"
                                         value="{{ $obj->translate($locale)->description }}"
                      @if($locale == 'ar')
                          data-validation="required , onlyArabic"
                      @else
                          data-validation="required , onlyEnglish"
                      @endif>{{$obj->translate($locale)->description??""}}</textarea>
        </div>
    @endforeach

    {{-- Date (not translatable) --}}
    <div class="col-6">
        <label for="date" class="form-label">{{ __("zemovit.date") }}</label>
        <input type="date" name="date" id="date" class="form-control" data-validation="required" value="{{ $obj->date }}">
    </div>

    {{-- Single Image Upload --}}
    <div class="col-6">
        <label for="image" class="form-label">{{__('zemovit.image')}}<span class="text-danger">*</span></label>
        <input type="file" name="image" id="image" class="form-control"  data-default-file="{{ showFile($obj->image) }}">
    </div>

    {{-- Multiple Images (optional) --}}
 
    <div class="col-12">
        <label class="form-label">{{ __('zemovit.images') }}</label>
        <div class="work_samples_grid">
            <label class="img_upload">
                <input type="file" accept="image/*" multiple name="files[]" id="img-upload" onchange="handleFileSelect(event)">
                <div class="img justify-content-center">
                    <img loading="lazy" src="{{asset("admin")}}/assets/img/plus.svg" alt="plus">
                </div>
            </label>
        </div>
    </div>
         @if ($obj->images->count() > 0)
            @foreach ($obj->images as $image)
                <div class="uploadedImage">
                    <img src="{{ showFile($image->image) }}" alt="">
                    <button type="button" style="border: none;background: none;color:red" class="delete deleteImagesButton"
                        delete-route="{{ route('blogs-images.destroy', $image->id) }}">
                        <img loading="lazy" src="{{ asset('admin') }}/assets/img/trash.svg" alt="trash">
                    </button>
                </div>
            @endforeach
        @endif
    <div class="col-12 modal-footer">
        {!! updateButton( $updateRoute ) !!}
        {!! closeButton() !!}
    </div>
</form>
