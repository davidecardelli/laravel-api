@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ($type->exists)
    <form action="{{ route('admin.types.update', $type->id) }}" method="POST" enctype="multipart/form-data" novalidate>
        @method('PUT')
    @else
        <form action="{{ route('admin.types.store') }}" method="POST" enctype="multipart/form-data" novalidate>
@endif
@csrf
<div class="row cols-1">
    <div class="col">
        {{-- Title --}}
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" class="form-control" id="type" name="type" placeholder="Type"
                value="{{ old('type', $type->type) }}">
        </div>
    </div>
</div>

<div class="d-flex justify-content-between">
    <div>
        <a href="{{ route('admin.types.index') }}" class="btn btn-secondary mt-3">Indietro</a>
    </div>
    <div class="mb-3">
        <button class="btn btn-small btn-success" type="submit">Salva</button>
    </div>
</div>
</form>
