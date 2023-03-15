@extends('layouts.app')

@section('content')
    <main class="my-5">
        <div class="container">
            <table class="table table-dark text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Type</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                        <tr>
                            <th scope="row">{{ $type['id'] }}</th>
                            <td>{{ $type['type'] }}</td>
                            <td>{{ $type['created_at'] }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST"
                                        class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger me-2">Elimina</button>
                                    </form>
                                    <a href="{{ route('admin.types.edit', $type->id) }}"
                                        class="btn btn-sm btn-warning me-2">Modifica</a>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                <a class="btn btn-primary" href="{{ route('admin.types.create') }}">Inserisci un nuovo type</a>
            </div>
        </div>
    </main>
@endsection
