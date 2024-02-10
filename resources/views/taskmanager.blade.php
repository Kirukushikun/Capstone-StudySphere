@include('components.sidebar')
@include('components.addtask')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('sources/Icon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/taskmanager.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>StudySphere</title>
</head>
<body>

    @yield('sidebar')

    <section class="home">
        <div class="taskManager">
            <h1>Task Manager</h1>
            <div class="user">
                <span>Hi, <b>{{ Auth::user()->firstname }}</b></span>
            </div>
        </div>

        <div class="taskManagerContent">
            <div class="labels">
                <p>Title</p>
                <p>Subject</p>
                <p>Due</p>
                <p>Priority</p>
                <p>Progress</p>
                <p>Action</p>
                <button onclick="popup()">add</button>
            </div>
        </div>

        @yield('addtask')
    </section>


    <script src="{{ asset('js/addtask.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>