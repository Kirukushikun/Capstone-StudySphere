<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('sources/Icon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/forgot.css') }}">
    <title>StudySphere</title>
</head>
<body>
    <form action="{{route('update.password')}}" method="POST">
        <h1>Account</h1>
        @csrf
        @method('PATCH')

        @if(session()->has('error'))
            <div class="error">
                <p>{{ session('error') }}</p>
            </div>
        @elseif(session()->has('status'))   
            <div class="success">
                <p>{{ session('status') }}</p>
            </div>
        @endif

        <div class="email">
            <label for="email">Email:</label>
            <input type="email" name="email" required/>
        </div>

        <div class="password">
            <label for="old_password">Enter Password:</label>
            <input type="password" name="old_password" required>
        </div>

        <div class="npassword">
            <label for="npassword">New Password:</label>
            <input type="password" name="npassword" required>
        </div>

        <div class="confirmpassword">
            <label for="cpassword">Confirm Password:</label>
            <input type="password" name="cpassword" required>
        </div>

        <div class="submit">
            <button type="submit" id="login">UPDATE</button>
        </div>
        

        <div >
            <p><a href="/login">Login</a></p>
        </div>
    </form>

    <img src="{{ asset('sources/Background.png') }}" alt="Image Unavailable" id="image1" />
    <img src="{{ asset('sources/Background2.png') }}" alt="Image Unavailable" id="image2" />
</body>
</html>