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

    <section class="home">

        <div class="quizzesHeader">
            <h1>Quizzes</h1>
            <span>Hi, <b>{{ Auth::user()->firstname }}</b></span>
        </div>

        <div class="quizzesContent">

            <div class="addQuizzes">
                <i class='bx bx-plus' onclick="popupQF()"></i>
            </div>

            <div class="userQuizzes">
                 @foreach($quizzes as $quiz)
                    <div class="quiz">

                        <div class="details">
                            <div class="subjecttitle">
                                <h1>{{ $quiz->subject }}</h1>
                            </div>

                            <div class="subjectdetail">
                                <h2>{{$quiz->name}}</h2>
                                <p>{{$quiz->description}}</p>
                            </div>

                        </div>


                        <div class="items">
                            <p>20 Items</p>

                            <div class="view">
                                <span><a>Take Quiz</a></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        @yield('addquiz')

    </section>

    <script src="{{ asset('js/formAdd.js') }}"></script>
    <script src="{{ asset('js/sideBar.js') }}"></script>


</body>
</html>