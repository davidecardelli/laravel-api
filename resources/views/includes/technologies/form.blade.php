@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ($technology->exists)
    <form action="{{ route('admin.technologies.update', $technology->id) }}" method="POST" enctype="multipart/form-data"
        novalidate>
        @method('PUT')
    @else
        <form action="{{ route('admin.technologies.store') }}" method="POST" enctype="multipart/form-data" novalidate>
@endif
@csrf
<div class="row cols-2">
    <div class="col">
        {{-- Type --}}
        <div class="mb-3">
            <label for="type" class="form-label">Title</label>
            <input type="text" class="form-control" id="type" name="type" placeholder="Type"
                value="{{ old('type', $technology->type) }}">
        </div>
    </div>

    <div class="col">
        {{-- Image URL --}}
        <div class="mb-3">
            <label for="logo" class="form-label">Image URL</label>
            <input type="file" class="form-control" id="logo" name="logo" placeholder="Image URL"
                value="{{ old('logo', $technology->logo) }}">
        </div>
    </div>
</div>

<div class="d-flex justify-content-between">
    <div>
        <a href="{{ route('admin.technologies.index') }}" class="btn btn-secondary mt-3">Indietro</a>
    </div>
    <div class="mb-3">
        <button class="btn btn-small btn-success" type="submit">Salva</button>
    </div>
</div>
</form>
