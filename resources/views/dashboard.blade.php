@include('components.sidebar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('sources/Icon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>StudySphere</title>
</head>
<body>

    @yield('sidebar')
    <section class="home">
        <div class="dashboardHeader">
            <h1>Dashboard</h1>
            <div class="user">
                <span>Hi, <b>{{ Auth::user()->firstname }}</b></span>
            </div>            
        </div>

        <div class="content">
            <div class="container1">
                <div class="TaskManager">
                    <h2>TaskManager</h2>
                    @foreach($tasks as $task)
                    <div class="items">
                        <h3>{{$task->title}}</h3>
                        <div class="status">
                            <p>{{ $task->due_date->format('m/d') }} | {{$task->priority}} | {{ $task->status == 'in_progress' ? 'In Progress' : $task->status }}</p>
                        </div>

                    </div>
                    @endforeach
                </div>
                <div class="Calendar">
                    <h2>Calendar</h2>
                    <div class="items">
                        <h3>Examination in Arduino</h3>
                        <p>Feb 20</p>
                    </div>
                </div>
            </div>

            <div class="container2">
                <div class="QuizSection">
                    <h2>Quizzes</h2>                    
                    @foreach($quizzes as $quiz)
                    <div class="items">
                        <h3>{{$quiz->name}}</h3>
                        <p>20 Items</p>
                    </div>
                    @endforeach
                </div>
                <div class="Repository">
                    <h2>Subjects</h2>
                    @foreach($subjects as $subject)
                    <div class="items">
                        <h3>{{$subject->subject}}</h3>
                        <p class="description">{{$subject->description}}</p>
                        <p>20 items</p>
                    </div>                    
                    @endforeach
                </div>                
            </div>
        </div>
    </section>

    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>