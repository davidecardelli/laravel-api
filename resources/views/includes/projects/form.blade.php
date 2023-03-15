@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ($project->exists)
    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data"
        novalidate>
        @method('PUT')
    @else
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" novalidate>
@endif
@csrf
<div class="row cols-3">
    <div class="col">
        {{-- Title --}}
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                value="{{ old('title', $project->title) }}">
        </div>
    </div>

    <div class="col">
        {{-- Image URL --}}
        <div class="mb-3">
            <label for="image" class="form-label">Image URL</label>
            <input type="file" class="form-control" id="image" name="image" placeholder="Image URL"
                value="{{ old('image', $project->image) }}">
        </div>
    </div>

    <div class="col">
        {{-- GitHub URL --}}
        <div class="mb-3">
            <label for="url" class="form-label">GitHub URL</label>
            <input type="text" class="form-control" id="url" name="url" placeholder="GitHub URL"
                value="{{ old('url', $project->url) }}">
        </div>
    </div>
</div>


<div class="row row-cols-1">
    <div class="col">
        {{-- Description --}}
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description">{{ old('description', $project->description) }}</textarea>
        </div>
    </div>
</div>

<div class="row row-cols-2 align-items-center">
    <div class="col">
        {{-- Type --}}
        <div class="mb-3">
            <label for="type_id" class="form-label">Type</label>
            <select class="form-control" id="type_id" name="type_id">
                <option value="">Nessun tipo</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" @if ($project->type_id == $type->id) selected @endif>
                        {{ $type->type }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col text-center">
        {{-- Technologies --}}
        <div class="mb-3">
            @foreach ($technologies as $technology)
                <input class="form-check-input" type="checkbox" value="{{ $technology->id }}"
                    id="technology-{{ $technology->id }}" name="technologies[]"
                    @if (in_array($technology->id, old('technologies', $project_technologies))) checked @endif>
                <label class="form-check-label" for="technology-{{ $technology->id }}">{{ $technology->type }}</label>
            @endforeach
        </div>
    </div>
</div>

<div class="d-flex justify-content-between">
    <div>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary mt-3">Indietro</a>
    </div>
    <div class="mb-3">
        <button class="btn btn-small btn-success" type="submit">Salva</button>
    </div>
</div>
</form>
