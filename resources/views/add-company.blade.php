@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add company</title>

    </head>

    <body class="antialiased bg-white">
        <div class="d-flex justify-content-center align-items-center">
            <form action="{{ route('company.save') }}" method="company">
                @csrf
                    name : <input class="form-control form-control-sm bg-white" type="text" name="name" value=""><br>
                    address : <textarea class="form-control form-control-sm bg-white" name="address"></textarea> <br>
                    phone : <input class="form-control form-control-sm bg-white" type="text" name="phone" value=""><br>
                    email : <input class="form-control form-control-sm bg-white" type="text" name="email" value=""><br>
                    logo_name : <input class="form-control form-control-sm bg-white" type="text" name="logo_name" value=""><br>
                    website : <input class="form-control form-control-sm bg-white" type="text" name="website" value=""><br>         
                    <input class="btn btn-primary" type="submit" value="Submit">  
            </form>
        </div>
    </body>
</html>
@endsection
