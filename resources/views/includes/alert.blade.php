@if (session('message'))
    <div class="container">
        <div class="alert alert-{{ session('type') }}">
            {{ session('message') }}
        </div>
    </div>
@endif
