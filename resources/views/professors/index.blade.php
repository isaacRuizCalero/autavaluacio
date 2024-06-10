@extends('layouts.main')

@section('content')
    <div id="app">
        <veure-autoavaluacions></veure-autoavaluacions>
    </div>

    <script>
        window.Laravel = {
            csrfToken: '{{ csrf_token() }}',
            userId: '{{ Auth::user()->id }}'
        };
    </script>
@endsection
