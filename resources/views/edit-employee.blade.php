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

        @foreach ( $errors->all() as $error)
            <p class="text-center text-danger" > {{ $error }} </p>
        @endforeach

        <div class="d-flex justify-content-center align-items-center">
            <form action="{{ url('update-employee/'.$post->id) }}" method="POST">
                @csrf
                @method('PUT')
                first_name : <input class="form-control form-control-sm bg-white" type="text" name="first_name" value="{{ $post->first_name }}"><br>
                last_name : <input class="form-control form-control-sm bg-white" name="last_name" value="{{ $post->last_name }}"> <br>
                phone : <input class="form-control form-control-sm bg-white" maxlength="10" pattern="[1-9]{1}[0-9]{9}" type="text" name="phone" value="{{ $post->phone }}"><br>
                email : <input class="form-control form-control-sm bg-white" type="text" name="email" value="{{ $post->email }}"><br>
                company_name : <input class="form-control form-control-sm bg-white" type="text" name="company_name" value="{{ $comp_name }}"><br>       
                <input class="btn btn-primary" type="submit" value="Submit">
            </form>
        </div>
    </body>
</html>
@endsection
