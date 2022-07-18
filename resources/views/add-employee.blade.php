@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add employee</title>

    </head>
    <body class="antialiased bg-white">

        @foreach ( $errors->all() as $error)
            <p class="text-center text-danger" > {{ $error }} </p>
        @endforeach

        <div class="d-flex justify-content-center align-items-center">
            <form action="{{ url('save-employee') }}" method="POST">
                @csrf
                @method('PUT')
                    first_name : <input class="form-control form-control-sm bg-white" type="text" name="first_name" value=""><br>
                    last_name : <input class="form-control form-control-sm bg-white" name="last_name" value=""> <br>
                    phone : <input class="form-control form-control-sm bg-white" maxlength="10" pattern="[1-9]{1}[0-9]{9}" type="text" name="phone" value=""><br>
                    email : <input class="form-control form-control-sm bg-white" type="text" name="email" value=""><br>
                    company_name : <input class="form-control form-control-sm bg-white" type="text" name="company_name" value=""><br>       
                    <input class="btn btn-primary" type="submit" value="Submit">  
            </form>
            @if($errors->any())
                <div class="alert alert-danger">
                    <p><strong>Opps Something went wrong</strong></p>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </body>
</html>
@endsection