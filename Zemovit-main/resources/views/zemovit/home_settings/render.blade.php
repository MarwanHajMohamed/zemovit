@foreach($sections as $section)
    <div class="col">
        <div class="card app-demo p-2">
            <img class="img-fluid rounded-4" src="{{showFile($section->image)}}" alt="app calendar">
            <div class="card-overlay"></div>
            <div class="demo-text p-xl-4 p-lg-2 p-0">
                <div class="d-flex gap-2">
                    <h4 class="fw-light mt-1 mb-0">{{ $section->title }}</h4>
                    <h4 class="fw-light mt-1 mb-0">({{ \App\Enums\SectionNamesEnum::tryFrom($section->section_name)->lang() }})</h4>
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
@endforeach
