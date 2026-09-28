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
    @if(count($sections) < \App\Enums\SectionNamesEnum::count())
        <div id="buttonAddSection">
            {!! addButton($createRoute, $addButtonText) !!}
        </div>
    @endif
    {!! addButtonTwo(route('arrangements.index', ['table' => 'home_settings', 'column' => 'section_name']), __("zemovit.arrangement")) !!}
    <div class="row g-3 row-deck row-cols-xxl-3 row-cols-lg-2 row-cols-md-1 row-cols-sm-1 row-cols-1 home_sections">
        @foreach($sections as $section)
          @if($section->section_name != \App\Enums\SectionNamesEnum::Banner->value)
            <div class="col">
                <div class="card app-demo p-2">
                    @if(isset($section->image))
                        <img class="img-fluid rounded-4" src="{{showFile($section->image)}}" alt="app calendar">
                    @endif
                    <div class="card-overlay"></div>
                    <div class="demo-text p-xl-4 p-lg-2 p-0">
                        <div class="d-flex gap-2">
                            <h4 class="fw-light mt-1 mb-0">{{ $section->title }}</h4>
                            <h4 class="fw-light mt-1 mb-0">
                                ({{ \App\Enums\SectionNamesEnum::tryFrom($section->section_name)->lang() }})</h4>
                        </div>
                        <p>{{ $section->description }}</p>
                        <button type="button" class="btn text-uppercase editButton" data-bs-toggle="modal"
                                data-bs-target="#createModal"
                                model-route="{{ route('home-settings.edit', $section->id) }}"
                                model-title="{{ __("zemovit.edit") }} {{ \App\Enums\SectionNamesEnum::tryFrom($section->section_name)->lang() }}">
                            {{ __('zemovit.edit_section') }}
                        </button>
                    </div>

                </div>
            </div>
            @endif
        @endforeach
    </div>

@endsection

@section('js')
    <script src="{{ asset('admin') }}/assets/js/bundle/dataTables.bundle.js"></script>
    <script>
        $(document).ready(function () {
            let columns = [
                {"data": 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {"data": 'section_name', name: 'section_name', orderable: false, searchable: true},
                {"data": 'title', name: 'title', orderable: false, searchable: true},
                {"data": 'description', name: 'description', orderable: false, searchable: true},
                {"data": 'image', name: 'image', orderable: false, searchable: true},
                {"data": "actions", orderable: false, searchable: false}
            ];
            showDataTable("{{ $dataTableRoute }}", columns);
        });
    </script>
@endsection
