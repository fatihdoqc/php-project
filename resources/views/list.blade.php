@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>    
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="js/people.js"> </script>

        <title>IPera</title>

        <!-- Fonts -->
        <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">

        <!-- Styles -->
        <style src="css/app.css"></style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div id="datatable-wrapper">
            <h4>
            @if (Session::has('company_status'))
            <div class="alert alert-dark bg-dark text-white" role="alert">{{ Session::get('company_status') }}</div>
            @endif
            </h4>
            <table id="example" class="display" width="100%">

                @foreach ($posts as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->website }}</td>
                    <td><a class="btn btn-primary" href="/edit-company/{{$item->id}}">Edit</a>
                        <a class="btn btn-danger" href="/delete-company/{{$item->id}}">Delete</a> </td>
                </tr>
                @endforeach

            </table>
        </div>
        <a class="btn btn-dark" href="/add-company">Add Company</a>

    </body>
</html>
@endsection