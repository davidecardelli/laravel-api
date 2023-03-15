@extends('layouts.app')

@section('content')
    <main class="my-5">
        <div class="container">
            <table class="table table-dark text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Type</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($technologies as $technology)
                        <tr class="text-center">
                            <th scope="row">{{ $technology['id'] }}</th>
                            <td>{{ $technology['type'] }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $technology['logo']) }}" alt="{{ $technology['type'] }}"
                                    style="height: 25px" class="img-fluid">
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <form action="{{ route('admin.technologies.destroy', $technology->id) }}" method="POST"
                                        class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger me-2">Elimina</button>
                                    </form>
                                    <a href="{{ route('admin.technologies.edit', $technology->id) }}"
                                        class="btn btn-sm btn-warning me-2">Modifica</a>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                <a class="btn btn-primary" href="{{ route('admin.technologies.create') }}">Inserisci un nuovo type</a>
            </div>
        </div>
    </main>
@endsection
