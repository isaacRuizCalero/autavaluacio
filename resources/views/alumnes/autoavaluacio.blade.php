@extends('layouts.main')

@section('content')
<head>
    <!-- Otros elementos head -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<div id="app">
    <autoavaluacio></autoavaluacio>
</div>
@endsection

<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
        'userId' => Auth::user()->id,
    ]) !!};
    console.log(window.Laravel);
    console.log(document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
</script>
