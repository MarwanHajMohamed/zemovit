@extends('nami.layout.indexs.index')
@section("style")
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/cssbundle/dataTables.min.css">
@endsection

@section('page-title')
    {{ $bladeTitle }}
@endsection

@section('page-links')
    <li class="breadcrumb-item active" aria-current="page">{{ $bladeTitle }}</li>
@endsection



@section('content')
    <div class="mb-3">
{{--        {!! translateButton( ) !!}--}}
    </div>
    <form class="row g-3 from-submit-global" method="post"
          action="{{ isset($model) ? $updateRoute : $storeRoute }}"
          enctype="multipart/form-data">
        @csrf
        @if(isset($model))
            @method('PUT')
        @endif

        <!-- Title Fields -->
        @foreach (config('translatable.locales') as $locale)
            <div class="col-6 translation-group">
                <label for="title_{{ $locale }}" class="form-label">
                    {{ __("zemovit.title") }} {{ getFieldLanguage($locale) }}
                </label>
                <input type="text" id="title_{{ $locale }}"
                       name="{{ $locale }}[title]"
                       class="form-control translate-input"
                       value="{{ old("$locale.title", isset($model) ? $model->translate($locale)->title ?? '' : '') }}"
                       @if($locale == 'ar')
                           data-validation="required , onlyArabic"
                       @else
                           data-validation="required , onlyEnglish"
                    @endif>
            </div>
        @endforeach

        <!-- Description Fields -->
        @foreach (config('translatable.locales') as $locale)
            <div class="col-6 translation-group">
                <label for="description_{{ $locale }}" class="form-label">
                    {{ __("zemovit.description") }} {{ getFieldLanguage($locale) }}
                </label>
                <textarea id="description_{{ $locale }}"
                          name="{{ $locale }}[description]"
                          class="form-control translate-input"
                          @if($locale == 'ar')
                              data-validation="required , onlyArabic"
                          @else
                              data-validation="required , onlyEnglish"
                      @endif>{{ old("$locale.description", isset($model) ? $model->translate($locale)->description ?? '' : '') }}</textarea>
            </div>
        @endforeach

        <!-- Button Link -->
        <div class="col-md-6">
            <label for="btn_link" class="form-label">
                {{__('zemovit.link')}}<span class="text-danger">*</span>
            </label>
            <input type="text" name="btn_link" id="btn_link"
                   class="form-control" required
                   value="{{ old('btn_link', $model->btn_link ?? '') }}">
        </div>

        <!-- Image Upload -->
        <div class="col-md-6">
                <div class="card-body">
                    <h6>{{ __('zemovit.image') }}</h6>
                    <input type="file" name="image" class="dropify"
                           data-default-file="{{ isset($model) && $model->image ? asset('storage/'.$model->image) : '' }}"
                           data-height="200">
                </div>
        </div>

        <div class="col-12 modal-footer">
            {!! storeButton( $storeRoute ) !!}
        </div>
    </form>
@endsection

@section('js')
    <script src="{{ asset('admin') }}/assets/js/bundle/dataTables.bundle.js"></script>
    <script>
        $(document).ready(function () {
            let columns = [
                {"data": 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {"data": "actions", orderable: false, searchable: false}
            ];
            showDataTable("{{ $dataTableRoute }}", columns);
        });
    </script>
@endsection
