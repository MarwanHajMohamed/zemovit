@extends('nami.layout.indexs.index')
@section("style")

    {{-- <link rel="stylesheet" href="{{asset("admin")}}/assets/cssbundle/summernote.min.css"/> --}}
    <style>
        .tox-notification,
        .tox .tox-statusbar {
            display: none !important;
        }
    </style>
@endsection
@section('page-title')
    {{__('auth.settings')}}
@endsection
@section('page-links')
    <li class="breadcrumb-item active" aria-current="page"> {{__("finance.clients")}}</li>
@endsection
@section('content')

    @if (auth('admin')->user()->admin_type == \App\Enums\AdminTypeisEnum::Developer->value)
        <button type="button" class="btn btn-success mb-2 p-2" id="translate-all" style="width: fit-content">
            <i class="fa fa-language"></i>
        </button>
    @endif

    {{-- {!! addButton(route("settings.create") , __('skaeeb.settings')) !!} --}}
    <form class="row g-3 from-submit-global" method="post"
          action="{{ isset($settings) ? route('settings.update', $settings->id) : route('settings.store') }}"
          enctype="multipart/form-data">
        @if(isset($settings))
            @method('PUT')
        @endif

        @foreach (config('translatable.locales') as $locale)
            <div class="col-3 translation-group">
                <label for="TextInput" class="form-label">{{ __("auth.website_name")}} {{ getFieldLanguage($locale) }}</label>
                <fieldset class="form-icon-group right-icon position-relative">
                    <div class="form-icon position-absolute">
                        <i class="fa fa-globe "></i>
                    </div>
                    <input type="text" name="{{ $locale }}[website_name]"
                        value="{{ isset($settings) && $settings ? optional($settings->translate($locale))->website_name : '' }}"
                        class="form-control translate-input"
                           data-validation="required"
                    >
                </fieldset>
            </div>
        @endforeach
        <hr>
        <div class="col-4">
            <label for="TextInput" class="form-label">{{__('auth.email')}}</label>
            <fieldset class="form-icon-group right-icon position-relative">
                <div class="form-icon position-absolute">
                    <i class="fa fa-envelope"></i>
                </div>
                <input type="email" name="email" class="form-control"
                       value="{{ isset($settings) ? optional($settings)->email : '' }}"
                       data-validation="required"

                >
            </fieldset>
        </div>

        <div class="col-4">
            <label for="TextInput" class="form-label">{{__('auth.phone')}}</label>

            <fieldset class="form-icon-group right-icon position-relative">
                <div class="form-icon position-absolute">
                    <i class="fa fa-mobile"></i>
                </div>
                <input type="text" name="phone" class="form-control"
                       value="{{ isset($settings) ? $settings->phone : '' }}"
                       data-validation="required"
                >
            </fieldset>
        </div>

        <div class="col-4">
            <label for="TextInput" class="form-label">{{__('auth.other_phone')}}</label>
            <fieldset class="form-icon-group right-icon position-relative">
                <div class="form-icon position-absolute">
                    <i class="fa fa-phone"></i>
                </div>
                <input type="text" name="other_phone" class="form-control"
                       value="{{ isset($settings) ? $settings->other_phone : '' }}"
                       data-validation="required"
                >
            </fieldset>
        </div>

        <hr>
        <div class="col-3">
            <label for="TextInput" class="form-label">{{__('auth.twitter_link')}}</label>

            <fieldset class="form-icon-group right-icon position-relative">
                <div class="form-icon position-absolute">
                    <i class="fa-brands fa-twitter"></i>
                </div>
                <input type="text" name="twitter" class="form-control"
                       value="{{ isset($settings) ? $settings->twitter : '' }}"
                       data-validation="required"
                >
            </fieldset>

        </div>

        <div class="col-3">
            <label for="TextInput" class="form-label">{{__('auth.facebook_link')}}</label>

            <fieldset class="form-icon-group right-icon position-relative">
                <div class="form-icon position-absolute">
                    <i class="fa-brands fa-facebook"></i>
                </div>
                <input type="text" name="facebook" class="form-control"
                       value="{{ isset($settings) ? $settings->facebook : '' }}"
                       data-validation="required"
                >
            </fieldset>

        </div>

        <div class="col-3">
            <label for="TextInput" class="form-label">{{__('auth.instgram_link')}}</label>
            <fieldset class="form-icon-group right-icon position-relative">
                <div class="form-icon position-absolute">
                    <i class="fa-brands fa-instagram"></i>
                </div>
                <input type="text" name="instagram" class="form-control"
                       value="{{ isset($settings) ? $settings->instagram : '' }}"
                       data-validation="required"
                >
            </fieldset>
        </div>
            <div class="col-3">
                <label for="TextInput" class="form-label">{{__('auth.tiktok')}}</label>
                <fieldset class="form-icon-group right-icon position-relative">
                    <div class="form-icon position-absolute">
                        <i class="fa-brands fa-tiktok"></i>
                    </div>
                    <input type="text" name="tiktok" class="form-control"
                           value="{{ isset($settings) ? $settings->tiktok : '' }}"
                           data-validation="required"
                    >
                </fieldset>
            </div>

{{--        <div class="col-3">--}}
{{--            <label for="TextInput" class="form-label">{{__('auth.snapchat_link')}}</label>--}}
{{--            <fieldset class="form-icon-group right-icon position-relative">--}}
{{--                <div class="form-icon position-absolute">--}}
{{--                    <i class="fa-brands fa-snapchat"></i>--}}
{{--                </div>--}}
{{--                <input type="text" name="snapchat" class="form-control"--}}
{{--                       value="{{ isset($settings) ? $settings->snapchat : '' }}">--}}
{{--            </fieldset>--}}
{{--        </div>--}}


{{--        <div class="col-3">--}}
{{--            <label for="TextInput" class="form-label">{{__('auth.linkedin_link')}}</label>--}}
{{--            <fieldset class="form-icon-group right-icon position-relative">--}}
{{--                <div class="form-icon position-absolute">--}}
{{--                    <i class="fa-brands fa-linkedin-square"></i>--}}
{{--                </div>--}}
{{--                <input type="text" name="linkedin" class="form-control"--}}
{{--                       value="{{ isset($settings) ? $settings->linkedin : '' }}">--}}
{{--            </fieldset>--}}

{{--        </div>--}}
{{--        <div class="col-3">--}}
{{--            <label for="TextInput" class="form-label">{{__('auth.youtube_link')}}</label>--}}
{{--            <fieldset class="form-icon-group right-icon position-relative">--}}
{{--                <div class="form-icon position-absolute">--}}
{{--                    <i class="fa-brands fa-youtube"></i>--}}
{{--                </div>--}}
{{--                <input type="text" name="youtube" class="form-control"--}}
{{--                       value="{{ isset($settings) ? $settings->youtube : '' }}">--}}
{{--            </fieldset>--}}
{{--        </div>--}}
{{--        <div class="col-3">--}}
{{--            <label for="TextInput" class="form-label">{{__('auth.whatsapp_link')}}</label>--}}
{{--            <fieldset class="form-icon-group right-icon position-relative">--}}
{{--                <div class="form-icon position-absolute">--}}
{{--                    <i class="fa-brands fa-whatsapp"></i>--}}
{{--                </div>--}}
{{--                <input type="text" name="whatsapp" class="form-control"--}}
{{--                       value="{{ isset($settings) ? $settings->whatsapp : '' }}">--}}
{{--            </fieldset>--}}
{{--        </div>--}}
        <div class="col-3">
            <label for="TextInput" class="form-label">{{__('auth.map_link')}}</label>
            <fieldset class="form-icon-group right-icon position-relative">
                <div class="form-icon position-absolute">
                    <i class="fa fa-link"></i>
                </div>
                <input type="text" name="map_link" class="form-control"
                       value="{{ isset($settings) ? $settings->map_link : '' }}"
                       data-validation="required"
                >
            </fieldset>
        </div>

        <hr>

        @foreach (config('translatable.locales') as $locale)
            <div class="col-6 translation-group">
                <label for="TextInput" class="form-label">{{ __('auth.copyright') }} {{ getFieldLanguage($locale) }} </label>
                <fieldset class="form-icon-group right-icon position-relative">
                    <div class="form-icon position-absolute">
                        <i class="fa fa-copyright"></i>
                    </div>
                    <input type="text" name="{{ $locale }}[copyright]" class="form-control translate-input"
                           value="{{ $settings?->translate($locale)?->copyright ?? '' }}"
                           data-validation="required"
                    >
                </fieldset>
            </div>
        @endforeach

        <hr>
        <div class="col-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h6>{{__('auth.logo_header')}}</h6>
                        <input type="file"
                               data-default-file="{{ isset($settings) ? showFile($settings->logo_header): '' }}"
                               name="logo_header" class="dropify"
                               @if(!isset($settings) || empty($settings->logo_header)) data-validation="required" @endif
                        >
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h6>{{__('auth.logo_footer')}}</h6>
                        <input type="file"
                               data-default-file="{{ isset($settings) ? showFile($settings->logo_footer): '' }}"
                               name="logo_footer" class="dropify"
                               @if(!isset($settings) || empty($settings->logo_footer)) data-validation="required" @endif
                        >
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h6>{{__('auth.favicon')}}</h6>
                        <input type="file" data-default-file="{{ isset($settings) ? showFile($settings->favicon): '' }}"
                               name="favicon" class="dropify"
                               @if(!isset($settings) || empty($settings->favicon)) data-validation="required" @endif

                        >
                    </div>
                </div>
            </div>
        </div>
        <hr>


        @foreach (config('translatable.locales') as $locale)
            <div class="col-6 translation-group">
                <label for="TextInput" class="form-label">{{__('auth.footer_text')}} {{ getFieldLanguage($locale) }}</label>
                <textarea class="form-control translate-input" rows="10"
                        name="{{ $locale }}[footer_text]">{{ isset($settings) && $settings->translate($locale) ? $settings->translate($locale)->footer_text : '' }}</textarea>
            </div>
        @endforeach

        {{-- @foreach (config('translatable.locales') as $locale)
            <div class="col-6 translation-group">
                <label for="TextInput" class="form-label">{{ __('auth.privacy_policy')}} {{ getFieldLanguage($locale) }}</label>
                <textarea class="mytextarea " rows="10"
                          name="{{ $locale }}[privacy]">{{ isset($settings) && $settings->translate($locale) ? $settings->translate($locale)->privacy : '' }}</textarea>
            </div>
        @endforeach --}}

        <div class="col-12 modal-footer">
            <button class="btn btn-primary" type="submit">{{__("buttons.save")}}</button>
        </div>

    </form>

@endsection


@section('js')
    <script src="{{asset('admin')}}/assets/js/tinymce.min.js"></script>
    <script>
        $(document).ready(function () {
            tinymce.init({
                selector: '.mytextarea',
                plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            });
        });
    </script>
    {{-- <script src="{{asset("admin")}}/assets/js/bundle/summernote.bundle.js"></script>
    <script>
        $(document).ready(function () {
            $('.summernote').summernote();
        });
    </script> --}}
@endsection
