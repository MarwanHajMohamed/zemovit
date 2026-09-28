{{-- <form class="row g-3 from-submit-global" id="form" enctype="multipart/form-data" method="POST"> --}}
    <form class="row g-3 from-submit-global" method="post" action="{{ $storeRoute }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="table" value="{{ $table }}">
        <ul id="sortable" style="list-style: none; padding: 0;">
            @foreach ($data as $row)
                <li data-row-id="{{ $row->id }}" class="sortable-item">
                    {{ \App\Enums\SectionNamesEnum::tryFrom($row->$column)->lang()  }}
                    <input type="hidden" name="position[{{ $row->id }}]" value="{{ $row->position }}">
                </li>
            @endforeach
        </ul>
        <div class="col-12 modal-footer">
            {!! submitButton( $storeRoute ) !!}
            {!! closeButton() !!}
    </div>
</form>



