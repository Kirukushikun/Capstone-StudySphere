<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('sources/Icon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/quiztake.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>StudySphere</title>
</head>
<body>



    <form action="">

        <button type="button" class="exit" onclick="location.href='{{ route('quizview', ['id' => $quizzes->id]) }}'">
            <i class='bx bx-left-arrow-alt' ></i>
        </button>

        @foreach($questions as $question)
        <div class="container">
            <div class="quizQuestion">
                <p>Question No. 1</p>
                <h1>{{$question->question_text}}</h1>
            </div>
            @foreach ($choices[$question->id] as $choice)
            <div class="quizChoices">

                <div class="division">
                    <button>{{$choice->correct_choice}}</button>
                    <button>{{$choice->choice_text_2}}</button>                
                </div>

                <div class="division">
                    <button>{{$choice->choice_text_3}}</button>
                    <button>{{$choice->choice_text_4}}</button>                
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
        
        <div class="btnSubmit">
            <button type="submit">Submit</button>
        </div>
        

    </form>
    

</body>
</html>