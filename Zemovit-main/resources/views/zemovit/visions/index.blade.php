@extends('nami.layout.indexs.index')

@section("style")
    <style>
        .tox-notification,
        .tox .tox-statusbar {
            display: none !important;
        }
    </style>
@endsection

@section('page-title')
    {{ __('vision') }}
@endsection

@section('page-links')
    <li class="breadcrumb-item active" aria-current="page"> {{ __("vision") }}</li>
@endsection

@section('content')

    <form class="row g-3 from-submit-global" method="post"
          action="{{ isset($vision) ? route('visions.update', $vision->id) : route('visions.store') }}"
          enctype="multipart/form-data">
        @csrf
        @if(isset($vision))
            @method('PUT')
        @endif

        {{-- Translations --}}
        @foreach (config('translatable.locales') as $locale)
            <div class="col-6 translation-group">
                <label class="form-label">{{ __("auth.title") }} {{ getFieldLanguage($locale) }}</label>
                <input type="text" name="{{ $locale }}[title]"
                       value="{{ $vision?->translate($locale)?->title ?? '' }}"
                       class="form-control translate-input" data-validation="required">
            </div>

            <div class="col-6 translation-group">
                <label class="form-label">{{ __("auth.sub_title") }} {{ getFieldLanguage($locale) }}</label>
                <input type="text" name="{{ $locale }}[sub_title]"
                       value="{{ $vision?->translate($locale)?->sub_title ?? '' }}"
                       class="form-control translate-input">
            </div>

            <div class="col-6 translation-group">
                <label class="form-label">{{ __("auth.description") }} {{ getFieldLanguage($locale) }}</label>
                <textarea class="form-control translate-input mytextarea" rows="5"
                          name="{{ $locale }}[description]">{{ $vision?->translate($locale)?->description ?? '' }}</textarea>
            </div>
        @endforeach

 
        {{-- Image --}}
        <div class="col-6">
            <div class="card">
                     <h6>{{ __('auth.image') }}</h6>
                    <input type="file" name="image" class="dropify"
                           data-default-file="{{ isset($vision) ? showFile($vision->image) : '' }}"
                           @if(!isset($vision) || empty($vision->image)) data-validation="required" @endif>
             </div>
        </div>

        <div class="col-12 modal-footer">
            <button class="btn btn-primary" type="submit">{{ __("buttons.save") }}</button>
        </div>
    </form>

@endsection

@section('js')
    <script src="{{ asset('admin') }}/assets/js/tinymce.min.js"></script>
    <script>
        $(document).ready(function () {
            tinymce.init({
                selector: '.mytextarea',
                plugins: 'autolink lists link image charmap preview anchor ' +
                         'searchreplace visualblocks code fullscreen ' +
                         'insertdatetime media table paste code help wordcount',
                toolbar: 'undo redo | formatselect | bold italic backcolor | ' +
                         'alignleft aligncenter alignright alignjustify | ' +
                         'bullist numlist outdent indent | removeformat | help'
            });
        });
    </script>
@endsection
