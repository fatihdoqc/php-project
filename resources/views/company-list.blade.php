@extends('layouts.app')

@section('content')
<body>
        
    <div class="card">
        <div class="card-header">
            <h3> COMPANY LIST </h3>
            <a class="btn btn-primary float-right" href="/add-company">Add Company</a>
        </div>

        <table id="" class="display" width="100%">

        <ul class="list-group list-group-flush">
            <li class="list-group-item">
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
            </thead></li>         
                <tbody>
                    @foreach ($companies as $item)
                    <li class="list-group-item">
                        <tr>
                            <td> <img src="{{ asset('storage/'.$item->logo_name); }}" width="100" height="100"></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->website }}</td>
                            <td><a class="btn btn-outline-secondary" href="/edit-company/{{$item->id}}">Edit</a>
                                <a class="btn btn-danger" href="/delete-company/{{$item->id}}">Delete</a> </td>
                        </tr>
                    </li>

                    @endforeach
                </tbody>
        </ul>
    </table>

    </div>
</body>
@endsection
