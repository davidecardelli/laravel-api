<div class="col mb-3">
    <div class="card d-flex flex-column align-items-center justify-content-center h-100">
        <a href="{{ route('admin.projects.show', $project['id']) }}">
            <img class="p-3 card-img-top" src="{{ asset('storage/' . $project['image']) }}" alt="{{ $project['title'] }}">
        </a>
        <div class="card-body">
            <p class="text-center text-black mt-2 fw-bold text-uppercase">{{ $project['title'] }}</p>
        </div>
    </div>
</div>
