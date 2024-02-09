<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('sources/Icon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>StudySphere</title>
</head>
<body>
    <form action="{{route('login.post')}}" method="POST">
        <h1>Login</h1>
        @csrf 

        @if(session()->has('error'))
            <div class="error">
                <p>{{ session('error') }}</p>
            </div>            
        @endif

        <div class="email">
            <input type="email" name="email" placeholder="Email" required/>
        </div>

        <div class="password">
            <input type="password" name="password" placeholder="Password"required/>
        </div>

        <div>
            <a href="">Forgot Password?</a>
        </div>

        <div class="submit">
            <button type="submit" id="login">LOGIN</button>
        </div>
        

        <div >
            <p>Don't have an account? <a href="/signup">Signup</a></p>
        </div>
    </form>

    <img src="{{ asset('sources/Background.png') }}" alt="Image Unavailable" id="image1" />
    <img src="{{ asset('sources/Background2.png') }}" alt="Image Unavailable" id="image2" />

</body>
</html>