@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>    
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <title>Edit company</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>

    <body class="antialiased">
        @if (Session::has('company_update'))
        <span>{{ Session::get('company_update') }}</span>
        @endif
        <div class="d-flex justify-content-center align-items-center">
            <form action="{{ url('update-company/'.$post->id) }}" method="POST">
                @csrf
                @method('PUT')
                name : <input class="form-control form-control-sm" type="text" name="name" value="{{ $post->name }}"><br>
                address : <textarea class="form-control form-control-sm" name="address">{{ $post->address }}</textarea> <br>
                phone : <input class="form-control form-control-sm" type="text" name="phone" value="{{ $post->phone }}"><br>
                email : <input class="form-control form-control-sm" type="text" name="email" value="{{ $post->email }}"><br>
                logo_name : <input class="form-control form-control-sm" type="text" name="logo_name" value="{{ $post->logo_name }}"><br>
                website : <input class="form-control form-control-sm" type="text" name="website" value="{{ $post->website }}"><br>         
                <input class="btn btn-primary" type="submit" value="Submit">  
            </form>
        </div>
    </body>
</html>
@endsection
