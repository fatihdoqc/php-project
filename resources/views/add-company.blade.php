<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add company</title>

    </head>

    <body class="antialiased">
        @if (Session::has('company_add'))
        <span>{{ Session::get('company_add') }}</span>
        @endif
        <form action="{{ route('company.save') }}" method="company">
            @csrf
            name : <input type="text" name="name" value=""><br>
            address : <input type="text" name="address" value=""><br>
            phone : <input type="text" name="phone" value=""><br>
            email : <input type="text" name="email" value=""><br>
            logo_name : <input type="text" name="logo_name" value=""><br>
            website : <input type="text" name="website" value=""><br>         
            <input type="submit" value="Submit">  
        </form>
    </body>
</html>