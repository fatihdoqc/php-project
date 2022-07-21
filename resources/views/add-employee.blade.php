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
            <form action="{{ url('save-employee') }}" method="POST">
                @csrf
                @method('PUT')
                    First Name<span class="text-danger">*</span>
                    <input class="form-control form-control-sm bg-white" type="text" name="first_name" value=""><br>

                    Last Name<span class="text-danger">*</span>
                    <input class="form-control form-control-sm bg-white" name="last_name" value=""> <br>

                    Phone<span class="text-danger">*</span>
                    <input class="form-control form-control-sm bg-white" type="text" name="phone" value=""><br>

                    Email<input class="form-control form-control-sm bg-white" type="text" name="email" value=""><br>

                    Company Name<span class="text-danger">*</span>
                    <input class="form-control form-control-sm bg-white" type="text" name="company_name" value=""><br>  

                    <input class="btn btn-primary" type="submit" value="Submit">  
            </form>
        </div>
    </body>
@endsection