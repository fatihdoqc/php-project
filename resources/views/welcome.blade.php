@extends('layouts.app')

@section('content')

    <body class="antialiased">
        @if (Auth()->check())
            <h1> HOME </h1>
        @else
            <h1>Please login first</h1>
        @endif

    </body>

@endsection
