@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h2>Pannello di controllo</h2>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Gestisci i progetti</a>
        <a href="{{ route('admin.types.index') }}" class="btn btn-primary">Gestisci i type</a>
        <a href="{{ route('admin.technologies.index') }}" class="btn btn-primary">Gestisci le tecnologie</a>
    </div>
@endsection
