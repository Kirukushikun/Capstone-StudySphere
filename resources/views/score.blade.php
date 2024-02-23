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



<!-- <form>


    <div class="container">
        <div class="quizQuestion">
            <p></p>
            <h1>{{$score}}/{{$questions}}</h1>
        </div>
    </div>

    <div class="btnSubmit">
        <button type="submit">Submit</button>
    </div>
</form> -->

<div class="Score">

    <div class="display">
        <h2>Your Score Is</h2>
        <h1>{{$score}}/{{$questions}}</h1>

        <div class="btns">
            <button class="retake" onclick="location.href='{{route('quiz.take', $quizzes->id)}}'">Retake</button>
            <button class="take" onclick="location.href='{{route('quizview', $quizzes->id)}}'">Exit</button>
        </div>

    </div>



</div>

</body>
</html>