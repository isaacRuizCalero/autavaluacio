@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Editar Usuari</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('usuaris.update', $usuari->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="nom_usuari" class="form-label">Nom d'Usuari</label>
                            <input type="text" class="form-control" id="nom_usuari" name="nom_usuari" value="{{ old('nom_usuari', $usuari->nom_usuari) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="contrasenya" class="form-label">Contrasenya</label>
                            <input type="password" class="form-control" id="contrasenya" name="contrasenya">
                            <small class="form-text text-muted">Deixa en blanc si no vols canviar la contrasenya.</small>
                        </div>

                        <div class="form-group mb-3">
                            <label for="correu" class="form-label">Correu</label>
                            <input type="email" class="form-control" id="correu" name="correu" value="{{ old('correu', $usuari->correu) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $usuari->nom) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="cognom" class="form-label">Cognom</label>
                            <input type="text" class="form-control" id="cognom" name="cognom" value="{{ old('cognom', $usuari->cognom) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="tipus_usuaris_id" class="form-label">Tipus d'Usuari</label>
                            <select class="form-select" id="tipus_usuaris_id" name="tipus_usuaris_id" required>
                                @foreach ($tipusUsuaris as $tipus)
                                    <option value="{{ $tipus->id }}" {{ $usuari->tipus_usuaris_id == $tipus->id ? 'selected' : '' }}>{{ $tipus->tipus }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block">Guardar Canvis</button>
                            <a href="{{ route('usuaris.index') }}" class="btn btn-secondary btn-block">Cancel·lar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
