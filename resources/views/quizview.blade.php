@include('components.sidebar')
@include('components.formAdd')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('sources/Icon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/quizzes.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>StudySphere</title>
</head>
<body>
    @yield('sidebar')

    <div class="home">

        <div class="quizzesHeader">
            <h1>{{ $quiz->name }}</h1>
            <span>Hi, <b>{{ Auth::user()->firstname }}</b></span>
        </div>

        <div class="quizzesContent">
            <p>Questions</p>
        </div>

    </div>
</body>
</html>