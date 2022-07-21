@extends('layouts.app')

@section('content')
    <body class="antialiased bg-white">

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
            <form action="{{ url('save-company') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    Name<span class="text-danger">*</span>
                    <input class="form-control form-control-sm bg-white" type="text" name="name" value=""><br>
                    Address
                    <textarea class="form-control form-control-sm bg-white" name="address"></textarea> <br>
                    Phone<input class="form-control form-control-sm bg-white" type="text" name="phone" value=""><br>
                    Email<input class="form-control form-control-sm bg-white" type="text" name="email" value=""><br>
                    Logo <input type="file" name="photo" class="form-control-file"><br><br>
                    Website<input class="form-control form-control-sm bg-white" type="text" name="website" value=""><br>         
                    <input class="btn btn-primary" type="submit" value="Submit">  
            </form>
        </div>
    </body>
@endsection
