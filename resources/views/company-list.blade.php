@extends('layouts.app')

@section('content')
<body>

    <div class="card m-3">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            COMPANY LIST
            <a type="button" class="btn btn-sm btn-primary" href="/add-company">Add Company</a>
        </h5>

        <div class="card-body">
            <h4>
                @if (Session::has('company_status'))
                <div class="alert alert-success " role="alert">{{ Session::get('company_status') }}</div>
                @endif
            </h4>

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
                                <td><img src="{{ asset('storage/'.$item->logo_name) }}" width="100" height="100"></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->website }}</td>
                                <td>
                                    <a class="btn btn-sm btn-outline-secondary" href="/edit-company/{{$item->id}}">Edit</a>
                                    <a class="btn btn-sm btn-danger" href="/delete-company/{{$item->id}}">Delete</a>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</body>
@endsection