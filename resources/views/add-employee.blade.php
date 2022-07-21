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
        
        <form action="{{ url('save-employee') }}" method="POST">
        <div class="card">

            <h5 class="card-header d-flex justify-content-between align-items-center">
                ADD EMPLOYEE
                <input class="btn btn-sm btn-primary" type="submit" value="Submit">  

            </h5>

            <div class="card-body">
                
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
                        <select class="form-select" name="company_name" aria-label="Default select example">
                            <option selected>Choose company</option>
                            @foreach ($companies as $comp)
                                <option value="{{ $comp->name }}"> {{ $comp->name }} </option>
                            @endforeach                            
                        </select>  
    
            </div>
        </form>
            
        </div>
    </body>
@endsection