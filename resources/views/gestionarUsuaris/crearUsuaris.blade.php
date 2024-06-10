@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Crear Nou Tipus Usuari</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('tipus_usuaris.store') }}">
        @csrf
        <div class="form-group">
            <label for="tipus">Tipus</label>
            <input type="text" class="form-control" id="tipus" name="tipus" value="{{ old('tipus') }}" required>
        </div>
        <div class="form-group">
            <label for="actiu">Actiu</label>
            <select class="form-control" id="actiu" name="actiu" required>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('tipus_usuaris.index') }}" class="btn btn-secondary">Cancel·lar</a>
    </form>
</div>
@endsection
