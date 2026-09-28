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
    {!! addButton($createRoute, $addButtonText) !!}
    <table id="dataTableObject" class="table display dataTable table-hover" style="width:100%">
        <thead>
        <tr>
            <th>{{ __('auth.SL') }}</th>
            <!-- Add your table headers here -->
            <th>{{ __('zemovit.title') }}</th>
            <th>{{ __('zemovit.description') }}</th>
            <th>{{ __('zemovit.image') }}</th>
            <th>{{ __('zemovit.page_name') }}</th>
            <th>{{ __('auth.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection

@section('js')
    <script src="{{ asset('admin') }}/assets/js/bundle/dataTables.bundle.js"></script>
    <script>
        $(document).ready(function () {
            let columns = [
                {"data": 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {"data": 'title', name: 'title', orderable: false, searchable: true},
                {"data": 'description', name: 'description', orderable: false, searchable: true},
                {"data": 'image', name: 'image', orderable: false, searchable: true},
                {"data": 'name', name: 'name', orderable: false, searchable: true},
                {"data": "actions", orderable: false, searchable: false}
            ];
            showDataTable("{{ $dataTableRoute }}", columns);
            $(document).on('click', '#generateKeywordsWithAI', function () {
                $('input[data-role="tagsinput"]').tagsinput();

                const $button = $(this);
                $button.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-1"></span> ...');

                // const arTitle = $(`[name="ar[title]"]`).val().trim();
                // const arDescription = $(`[name="ar[description]"]`).val().trim();
                const enTitle = $(`[name="en[title]"]`).val().trim();
                const enDescription = $(`[name="en[description]"]`).val().trim();

                // if (!arTitle && !arDescription) {
                //     alert("يجب إدخال العنوان أو الوصف بالعربية أولاً.");
                //     $button.prop('disabled', false).html('<i class="fa fa-language"></i>');
                //     return;
                // }

                $.ajax({
                    url: '{{ route("generate-keywords.index") }}',
                    method: 'GET',
                    data: {
                        texts: {
                            // ar: {
                            //     title: arTitle,
                            //     description: arDescription
                            // },
                            en: {
                                title: enTitle,
                                description: enDescription
                            }
                        },
                        source_lang: 'ar',
                        target_lang: 'en'
                    },
                    success: function (response) {
                        const { keywords } = response;
                        const translated = response.translated || {};
                        if (translated.title) {
                            $(`[name="en[title]"]`).val(translated.title);
                        }
                        if (translated.description) {
                            $(`[name="en[description]"]`).val(translated.description);
                        }
                        for (const locale in keywords) {
                            const input = $(`[name="${locale}[keywords]"]`);
                            if (input.length) {
                                if (input.tagsinput) {
                                    input.tagsinput('removeAll');
                                    (keywords[locale] || []).forEach(k => input.tagsinput('add', k));
                                } else {
                                    input.val((keywords[locale] || []).join(',')).trigger('change');
                                }
                            }
                        }
                    },
                    error: function (xhr) {
                        console.warn('Translation failed:', xhr.responseText);
                    },
                    complete: function () {
                        $button.prop('disabled', false).html('<i class="fa fa-language"></i>');
                    }
                });
            });
        });
    </script>
@endsection
