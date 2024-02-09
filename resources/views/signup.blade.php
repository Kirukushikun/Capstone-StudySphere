<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('sources/Icon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
    <title>StudySphere</title>
</head>
<body>
    <form action="{{route('signup.post')}}" method="POST">
        <h1>Sign Up</h1>
        @csrf
        <div class="fullname">
            <div class="firstname">
                <label for="fname">First Name:</label>
                <input type="text" name="firstname"/>               
            </div>

            <div class="lastname">
                <label for="lname">Last Name:</label>
                <input type="text" name="lastname"/>
            </div>

        </div>


        <div class="email">
            <label for="email">Email:</label>
            <input type="email" name="email"/>
        </div>

        <div class="password">
            <label for="password">Password:</label>
            <input type="password" name="password">
        </div>

        <div class="confirmpassword">
            <label for="cpassword">Confirm Password:</label>
            <input type="password" name="cpassword">
        </div>

        <div class="submit">
            <button type="submit" id="login">SIGN UP</button>
        </div>
        

        <div >
            <p>Already have an account? <a href="/login">Login</a></p>
        </div>
    </form>

    <img src="{{ asset('sources/Background.png') }}" alt="Image Unavailable" id="image1" />
    <img src="{{ asset('sources/Background2.png') }}" alt="Image Unavailable" id="image2" />
</body>
</html>