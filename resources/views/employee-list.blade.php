@extends('layouts.app')

@section('content')
<body>    
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
@endsection
