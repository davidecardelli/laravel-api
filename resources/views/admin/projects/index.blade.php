@extends('layouts.app')

@section('content')
    <main class="my-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 row-cols-xl-6">
                @foreach ($projects as $project)
                    @include('includes.card')
                @endforeach
            </div>
            <div class="text-center">
                <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">Inserisci un nuovo progetto</a>
            </div>
        </div>
    </main>
@endsection
