@extends('layouts.app')

@section('content')
    <body>

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

        <div class="">
            <form action="{{ url('update-employee/'.$post->id) }}" method="POST">
                @csrf
                @method('PUT')
                first_name : <input class="form-control form-control-sm bg-white" type="text" name="first_name" value="{{ $post->first_name }}"><br>
                last_name : <input class="form-control form-control-sm bg-white" name="last_name" value="{{ $post->last_name }}"> <br>
                phone : <input class="form-control form-control-sm bg-white" type="text" name="phone" value="{{ $post->phone }}"><br>
                email : <input class="form-control form-control-sm bg-white" type="text" name="email" value="{{ $post->email }}"><br>
                company_name : <input class="form-control form-control-sm bg-white" type="text" name="company_name" value="{{ $comp_name }}"><br>       
                <input class="btn btn-primary" type="submit" value="Submit">
            </form>
        </div>
    </body>
@endsection
