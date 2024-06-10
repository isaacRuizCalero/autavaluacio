@extends('layouts.main')

@section('usuarisSection')
    <div class="container">
        <h1>Llista d'Usuaris</h1>
        <a href="{{ route('usuaris.create') }}" class="btn btn-primary">Crear Nou Usuari</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom Usuari</th>
                    <th>Correu</th>
                    <th>Nom</th>
                    <th>Cognom</th>
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
                        <td>
                            <a href="{{ route('usuaris.edit', $usuari->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('usuaris.destroy', $usuari->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
