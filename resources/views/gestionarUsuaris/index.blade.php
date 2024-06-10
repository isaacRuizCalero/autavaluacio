@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Llista de Tipus Usuaris</h1>
    <a href="{{ route('tipus_usuaris.create') }}" class="btn btn-primary mb-3">Crear Nou Tipus Usuari</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipus</th>
                <th>Actiu</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tipusUsuaris as $tipusUsuari)
            <tr>
                <td>{{ $tipusUsuari->id }}</td>
                <td>{{ $tipusUsuari->tipus }}</td>
                <td>{{ $tipusUsuari->actiu ? 'Sí' : 'No' }}</td>
                <td>
                    <a href="{{ route('tipus_usuaris.edit', $tipusUsuari->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('tipus_usuaris.destroy', $tipusUsuari->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
