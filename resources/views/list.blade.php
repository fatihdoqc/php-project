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
        
        @if ( !(Auth()->check()) )
            <meta http-equiv="refresh" content="0; URL={{ url('/') }}" />
        @endif

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
        
        <h4>
        @if (Session::has('company_status'))
        <div class="alert alert-dark bg-dark text-white" role="alert">{{ Session::get('company_status') }}</div>
        @endif
        </h4>
        <h1 class="text-center" > COMPANY LIST </h1>
        <table id="" class="display" width="100%">

            <thead>
                <tr>
                    <th> COMPANY LOGO</th>
                    <th> NAME </th>
                    <th> ADDRESS </th>
                    <th> PHONE </th>
                    <th> EMAIL </th>
                    <th> WEBSITE </th>
                    <th> ACTION </th>
                </tr>
            </thead>

            <tbody>
            @foreach ($companies as $item)
                <tr>
                    <td> <img src="{{ asset('storage/'.$item->logo_name); }}" width="100" height="100"></td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->website }}</td>
                    <td><a class="btn btn-primary" href="/edit-company/{{$item->id}}">Edit</a>
                        <a class="btn btn-danger" href="/delete-company/{{$item->id}}">Delete</a> </td>
                </tr>
            @endforeach
            </tbody>

        </table>

        <a class="btn btn-dark" href="/add-company">Add Company</a>

        <br><br>
        <h1 class="text-center"> EMPLOYEE LIST </h1>
        <h4>
            @if (Session::has('employee_status'))
            <div class="alert alert-dark bg-dark text-white" role="alert">{{ Session::get('employee_status') }}</div>
            @endif
            </h4>
            <table id="" class="display" width="100%">
                
                <thead>
                    <tr>
                        <th> </th>
                        <th> FIRST NAME </th>
                        <th> LAST NAME </th>
                        <th> PHONE </th>
                        <th> EMAIL </th>
                        <th> COMPANY NAME </th>
                        <th> ACTION </th>
                    </tr>
                </thead>

                @foreach ($employees as $emp)
                <tr>
                    <td></td>
                    <td>{{ $emp->first_name }}</td>
                    <td>{{ $emp->last_name }}</td>
                    <td>{{ $emp->phone }}</td>
                    <td>{{ $emp->email }}</td>
                    <?php                    
                        foreach ($companies as $comp) {
                            if ($comp->id == $emp->company_id) {
                                ?>
                                <td> {{ $comp->name }} </td>
                                <?php
                                break;
                            }
                        }
                    
                     ?>
                    <td><a class="btn btn-primary" href="/edit-employee/{{$emp->id}}">Edit</a>
                        <a class="btn btn-danger" href="/delete-employee/{{$emp->id}}">Delete</a> </td>
                </tr>
                @endforeach
    
            </table>
    
            <a class="btn btn-dark" href="/add-employee">Add Employee</a>

    </body>
</html>
@endsection