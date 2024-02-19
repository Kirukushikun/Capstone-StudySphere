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

            <div class="addQuizzes">
                <i class='bx bx-plus' class="popup" onclick="popupQuestion()"></i>
            </div>
            @foreach ($questions as $question)
            <div class="question-container">
                    <div class="questionDetails">
                        <h2>{{ $question->question_text }}</h2>
                        <div class="questionChoices">
                            @foreach ($choices[$question->id] as $choice)
                                <div>
                                    <label for="">Correct Answer:</label>
                                    {{ $choice->correct_choice }}
                                </div>
                                <div>
                                    <label for="">Choice 2:</label>
                                    {{ $choice->choice_text_2 }}
                                </div>
                                <div>
                                    <label for="">Choice 3:</label>   
                                    {{ $choice->choice_text_3 }}
                                </div>
                                <div>
                                    <label for="">Choice 4:</label>
                                    {{ $choice->choice_text_4 }}
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="questionBtns">
                        <button>
                            <i class='bx bx-pencil'></i>
                        </button>
                        <form action="{{ route('question.delete', ['quiz_id' => $question->quiz_id, 'question_id' => $question->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <i class='bx bx-trash' ></i>
                            </button>
                        </form>
                    </div>
            </div>
            @endforeach
        </div>

        <form class="AddQuestion" action="{{route('question.post', ['id'=>$quiz->id])}}" method="POST">
            @csrf
            <div class="fillup">
                <h1>Create Question</h1>
                <label for="question_text">Question:</label>
                <input type="text" name="question_text">

                <label for="correct_choice">Correct Answer:</label>
                <input type="text" name="correct_choice">
                
                <label for="choice_text_1">Option 1:</label>
                <input type="text" name="choice_text_1">

                <label for="choice_text_2">Option 2:</label>
                <input type="text" name="choice_text_2">



                <label for="choice_text_3">Option 3:</label>
                <input type="text" name="choice_text_3">

                <label for="choice_text_4">Option 4:</label>
                <input type="text" name="choice_text_4">        


                <div class="btns">
                    <button type="submit" id="btnAddTask">Create</button>
                    <button type="button" class="close" id="btnCancel" onclick="popdownQuestion()">Cancel</button>
                </div>   

            </div>

        </form>

    </div>
    
    <script src="{{ asset('js/FormAdd.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>