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
            <label for="branch_admin_id">{{ __("zemovit.products")  }}</label>
            <select id="product_id" name="product_id" class="form-control select2">
                <option value="">{{ __('auth.choose') }}</option>
                @foreach(\App\Models\Zemovit\Product::all() ?? [] as $product)
                    <option value="{{ $product->id }}">{{ $product->{"title:en"} }}</option>
                @endforeach
            </select>
        </div>
        {{--        <div class="col-md-6 mt-3">--}}
        {{--            {!! addButton($createRoute , $addButtonText) !!}--}}
        {{--        </div>--}}
    </div>

    {!! addButton($createRoute, $addButtonText) !!}
    <table id="dataTableObject" class="table display dataTable table-hover" style="width:100%">
        <thead>
        <tr>
            <th>{{ __('auth.SL') }}</th>
            <!-- Add your table headers here -->
            <th>{{__('zemovit.product')}}</th>
            <th>{{__('zemovit.label')}}</th>
            <th>{{__('zemovit.value')}}</th>
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
            $('.select2').select2();
            let columns = [
                {"data": 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {"data": 'product_name', name: 'product_name', orderable: false, searchable: true},
                {"data": 'label', name: 'label', orderable: false, searchable: true },
                {"data": 'value', name: 'value', orderable: false, searchable: true },
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
                        response.product_id = $('#product_id').val();
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
            $('#product_id').on('change', function () {
                table.ajax.reload();
            });
{{--            showDataTable("{{ $dataTableRoute }}", columns);--}}
        });
    </script>
@endsection
