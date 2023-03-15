@extends('layouts.app')

@section('content')
    <main class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <img class="img-fluid" src="{{ asset('storage/' . $project['image']) }}" alt="{{ $project['title'] }}">
                </div>
                <div class="col-8">
                    <h1>{{ $project['title'] }}</h1>
                    <p>{{ $project['description'] }}</p>
                    <a href="{{ $project['url'] }}" class="btn btn-primary"><i class="fa-brands fa-github me-1"></i>Vai al
                        GitHub</a>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger me-2">Elimina</button>
                </form>
                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-warning me-2">Modifica</a>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-secondary">Indietro</a>
            </div>

        </div>
    </main>
@endsection
