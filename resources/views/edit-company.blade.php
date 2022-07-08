<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit company</title>

    </head>

    <body class="antialiased">
        @if (Session::has('company_update'))
        <span>{{ Session::get('company_update') }}</span>
        @endif
        <form action="{{ route('company.update' , $post->id) }}" method="company">
            @csrf
            name : <input type="text" name="name" value="{{ $post->name }}"><br>
            address : <input type="text" name="address" value="{{ $post->address }}"><br>
            phone : <input type="text" name="phone" value="{{ $post->phone }}"><br>
            email : <input type="text" name="email" value="{{ $post->email }}"><br>
            logo_name : <input type="text" name="logo_name" value="{{ $post->logo_name }}"><br>
            website : <input type="text" name="website" value="{{ $post->website }}"><br>         
            <input type="submit" value="Submit">  
        </form>
    </body>
</html>