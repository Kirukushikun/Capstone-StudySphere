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

                        <div class="btns">
                            <button>
                                <i class='bx bx-pencil' onclick=""></i>
                            </button>
                            <button>
                                <i class='bx bx-trash' onclick=""></i>
                            </button>
                        </div>

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
                                <span><a href="{{route('quizview', ['id'=>$quiz->id ])}}">View Quiz</a></span>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>

        <form class="EditQuiz" action="{{ route('quiz.update', $quizID->id) }}" method="POST">
            <div class="fillup">
                @csrf
                @method('PATCH')
                <h1>Edit Quiz Container</h1>
                <label for="name">Quiz Name:</label>
                <input type="text" name="name" value='{{$quizID->name}}' required>

                <label for="subject">Subject:</label>
                <input type="text" name="subject" value="{{$quizID->subject}}" required>

                <label for="description" >Description:</label>
                <textarea name="description"  cols="30" rows="10" required>{{$quizID->description}}</textarea>

                <div class="btns">
                    <button type="submit" id="btnAddTask">Save</button>
                    <button type="button" class="close" id="btnCancel" onclick="window.location.href='{{ route('quizzes') }}'">Cancel</button>
                </div>        
            </div>
        </form>

    </section>

    <script src="{{ asset('js/formAdd.js') }}"></script>
    <script src="{{ asset('js/sideBar.js') }}"></script>


</body>
</html>