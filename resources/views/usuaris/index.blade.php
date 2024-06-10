@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">Llista d'Usuaris</h1>
            <a href="{{ route('usuaris.create') }}" class="btn btn-success mb-3">Crear Nou Usuari</a>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nom Usuari</th>
                            <th>Correu</th>
                            <th>Nom</th>
                            <th>Cognom</th>
                            <th>Actiu</th>
                            <th>Tipus Usuari</th>
                            <th>Accions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuaris as $usuari)
                        <tr>
                            <td>{{ $usuari->id }}</td>
                            <td>{{ $usuari->nom_usuari }}</td>
                            <td>{{ $usuari->correu }}</td>
                            <td>{{ $usuari->nom }}</td>
                            <td>{{ $usuari->cognom }}</td>
                            <td>{{ $usuari->actiu ? 'Sí' : 'No' }}</td>
                            <td> {{ $usuari->tipus_usuaris_id }}</td>
                            <td>
                                <a href="{{ route('usuaris.edit', $usuari->id) }}" class="text-primary text-decoration-underline">Editar</a>
                                <form action="{{ route('usuaris.destroy', $usuari->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este usuario?');">
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
        </div>
    </div>
</div>
@endsection
