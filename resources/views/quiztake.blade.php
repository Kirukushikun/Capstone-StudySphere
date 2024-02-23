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



<form action="{{ route('evaluate.quiz', ['id' => $quizzes->id]) }}" method="POST">
    @csrf
    
    <button type="button" class="exit" onclick="location.href='{{ route('quizview', ['id' => $quizzes->id]) }}'">
        <i class='bx bx-left-arrow-alt'></i>
    </button>

    @foreach($questions as $index => $question)
    <div class="container">
        <div class="quizQuestion">
            <p>Question No. {{ $index + 1 }}</p>
            <h1>{{ $question->question_text }}</h1>
        </div>
        <div class="quizChoices">
            @php
                $choices = $question->choices->pluck('correct_choice')->merge(
                            $question->choices->pluck('choice_text_2'))->merge(
                            $question->choices->pluck('choice_text_3'))->merge(
                            $question->choices->pluck('choice_text_4'))->shuffle();
            @endphp
            @foreach ($choices as $choice)
            <label>
                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $choice }}">
                {{ $choice }}
            </label>
            @endforeach
        </div>
    </div>
    @endforeach
    
    <div class="btnSubmit">
        <button type="submit">Submit</button>
    </div>
</form>

</body>
</html>