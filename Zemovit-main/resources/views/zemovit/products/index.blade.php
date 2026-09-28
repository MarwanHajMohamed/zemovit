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
    <div class="row mb-3 align-items-center">
        <div class="col-md-6">
            <label for="branch_admin_id">{{ __("zemovit.therapeutic_area")  }}</label>
            <select id="therapeutic_area_id" name="therapeutic_area_id" class="form-control select2">
                <option value="">{{ __('auth.choose') }}</option>
                @foreach(\App\Models\Zemovit\TherapeuticArea::all() ?? [] as $therapeutic_area)
                    <option value="{{ $therapeutic_area->id }}">{{ $therapeutic_area->{"title:en"} }}</option>
                @endforeach
            </select>
        </div>
    </div>

    {!! addButton($createRoute, $addButtonText) !!}
    <table id="dataTableObject" class="table display dataTable table-hover" style="width:100%">
        <thead>
        <tr>
            <th>{{ __('auth.SL') }}</th>
            <th>{{__('zemovit.title')}}</th>
            <th>{{__('zemovit.description')}}</th>
            <th>{{__('zemovit.therapeutic_area')}}</th>


            <!-- Add your table headers here -->
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
        $('.select2').select2();
        $(document).ready(function () {
            let columns = [
                {"data": 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {"data": 'title', name: 'title', orderable: false, searchable: true },
                {"data": 'description', name: 'description', orderable: false, searchable: true },
                {"data": 'therapeutic_area', name: 'therapeutic_area', orderable: false, searchable: true },

                {"data": "actions", orderable: false, searchable: false}
            ];
            let table = $("#dataTableObject").DataTable({
                responsive: true,
                processing: true,
                serverSide: false,
                ordering: true,
                searching: true,
                iDisplayLength: 10,
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "الكل"]],
                ajax: {
                    url: "{{ $dataTableRoute }}",
                    data: function (response) {
                        response.therapeutic_area_id = $('#therapeutic_area_id').val();
                    }
                },
                columns,
                language: {
                    sProcessing: "{{trans('dataTable.sProcessing')}}",
                    sLengthMenu: "{{trans('dataTable.sLengthMenu')}}",
                    sZeroRecords: "{{trans('dataTable.sZeroRecords')}}",
                    sInfo: "{{trans('dataTable.sInfo')}}",
                    sInfoEmpty: "{{trans('dataTable.sInfoEmpty')}}",
                    sInfoFiltered: "{{trans('dataTable.sInfoFiltered')}}",
                    sSearch: "{{trans('dataTable.sSearch')}}:",
                    oPaginate: {
                        sFirst: "{{trans('dataTable.sFirst')}}",
                        sPrevious: "{{trans('dataTable.sPrevious')}}",
                        sNext: "{{trans('dataTable.sNext')}}",
                        sLast: "{{trans('dataTable.sLast')}}"
                    }
                },
                order: [[2, "desc"]]
            });
            $('#therapeutic_area_id').on('change', function () {
                table.ajax.reload();
            });
{{--            showDataTable("{{ $dataTableRoute }}", columns);--}}
        });
    </script>
@endsection

