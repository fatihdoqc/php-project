@extends('layouts.app')

@section('content')
    <body class="antialiased text-left">

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
            <form action="{{ url('update-company/'.$post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <img  src=" {{ asset('storage/'.$post->logo_name); }}" width="100" height="100"><br>
                Name <input class="form-control form-control-sm" type="text" name="name" value="{{ $post->name }}"><br>
                Address <textarea class="form-control form-control-sm" name="address">{{ $post->address }}</textarea> <br>
                Phone <input class="form-control form-control-sm" type="text" name="phone" value="{{ $post->phone }}"><br>
                Email <input class="form-control form-control-sm" type="text" name="email" value="{{ $post->email }}"><br>

                <input type="file" name="photo" id="photo" class="form-control-file"><br><br>
                
                Website : <input class="form-control form-control-sm" type="text" name="website" value="{{ $post->website }}"><br>         
                <input class="btn btn-primary" type="submit" value="Submit">  
            </form>
        </div>

        
    </body>

@endsection
