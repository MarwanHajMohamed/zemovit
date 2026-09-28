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
            <th>{{__('zemovit.title')}}</th>
            <th>{{__('zemovit.image')}}</th>

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
                {"data": 'title', name: 'title', orderable: false, searchable: true },
                {"data": 'image', name: 'image', orderable: false, searchable: true },

                {"data": "actions", orderable: false, searchable: false}
            ];
            showDataTable("{{ $dataTableRoute }}", columns);
        });
    </script>
@endsection
