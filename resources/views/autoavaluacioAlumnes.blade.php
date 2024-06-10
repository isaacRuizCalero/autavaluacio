@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Autoavaluació Alumnes</h1>
    <p>Aquesta és la pàgina d'autoavaluació per als alumnes.</p>
</div>
{{ $user->rol->nombre }}
@endsection
