@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Detalls de l'Usuari</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $usuari->nom }} {{ $usuari->cognom }}</h5>
            <p class="card-text"><strong>Nom Usuari:</strong> {{ $usuari->nom_usuari }}</p>
            <p class="card-text"><strong>Correu:</strong> {{ $usuari->correu }}</p>
            <p class="card-text"><strong>Actiu:</strong> {{ $usuari->actiu ? 'Sí' : 'No' }}</p>
            <p class="card-text"><strong>Tipus Usuari:</strong> {{ $usuari->tipusUsuari->tipus }}</p>
            <a href="{{ route('usuaris.index') }}" class="btn btn-primary">Tornar</a>
        </div>
    </div>
</div>
@endsection
