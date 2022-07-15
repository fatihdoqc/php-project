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
        <div class="d-flex justify-content-center align-items-center">
            <form action="{{ url('save-employee') }}" method="POST">
                @csrf
                @method('PUT')
                    first_name : <input class="form-control form-control-sm bg-white" type="text" name="first_name" value=""><br>
                    last_name : <input class="form-control form-control-sm bg-white" name="last_name" value=""> <br>
                    phone : <input class="form-control form-control-sm bg-white" type="text" name="phone" value=""><br>
                    email : <input class="form-control form-control-sm bg-white" type="text" name="email" value=""><br>
                    company_name : <input class="form-control form-control-sm bg-white" type="text" name="company_name" value=""><br>       
                    <input class="btn btn-primary" type="submit" value="Submit">  
            </form>
        </div>
    </body>
</html>
@endsection