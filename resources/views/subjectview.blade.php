@include('components.sidebar')
@include('components.formAdd')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('sources/Icon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/repository.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>StudySphere</title>
</head>
<body>
    
    @yield('sidebar')

    <section class="home">
        
        <div class="subjectHeader">
            <h1>{{ $subjects->subject }}</h1>
            <div class="user">
                <span>Hi, <b>{{ Auth::user()->firstname }}</b></span>
            </div>            
        </div>

        <div class="subjectContent">

            <div class="userDocuments">
                
                <div class="materials">
                    <!-- This is where we will display Tasks and todo list made by the user -->
                    <div class="header">
                        <h2>Materials</h2>
                        <i class='bx bx-plus' onclick="popupAM()"></i>
                    </div>
                    
                    <div class="container">
                        @foreach($tasks as $task)
                        <div class="userData" onclick="location.href='{{route('taskmanager')}}'">
                            <h4>{{$task->title}}</h4>
                            <p>Task</p>
                        </div>
                        @endforeach

                        @foreach($quizzes as $quiz)
                        <div class="userData" onclick="location.href='{{route('quizview', ['id' => $quiz->id])}}'">
                            <h4>{{$quiz->name}}</h4>
                            <p>Quiz</p>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="files">
                    <!-- This is where we will display Documents and other files made by the user -->
                    <div class="header">
                        <h2>Documents</h2>
                        <i class='bx bxs-file-plus' onclick="popupDF()"></i>
                    </div>
                    

                    <div class="container">
                        @foreach($documents as $document)
                        <div class="userData">
                            <h4>{{$document->file_name}}</h4>
                            <p>File</p>
                        </div>
                        @endforeach
                    </div>


                </div>

            </div>

        </div>

        @yield('addmaterial')
        <form class="AddTaskMaterial" action="{{ route('taskmanager.post')}}" method="POST">
            @csrf
            <div  class="fillup">
                <h1>Add Task</h1>
                <input type="text" placeholder="Title" name="title" required>
                <input type="text" placeholder="Subject" name="subject" required value="{{$subjects->subject}}">

                <label for="due">Due Date:</label>
                <input type="date" name="due_date" required>

                <label for="priority">Priority Level:</label>
                <select class="form-control" id="priority" name="priority" required>
                    <option value="least">Least</option>
                    <option value="neutral">Neutral</option>
                    <option value="prioritize">Prioritize</option>
                </select>

                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="completed">Completed</option>
                </select>

                <div class="btns">
                    <button type="submit" id="btnAddTask" >Add</button>
                    <button type="button" class="close" id="btnCancel" onclick="popdownTF2()">Cancel</button>
                </div>
            </div>

        </form>

        <form class="AddQuizMaterial" action="{{ route('quizzes.post') }}" method="POST">
            @csrf 
            <div class="fillup">
                <h1>Make Quiz Container</h1>
                <label for="name">Quiz Name:</label>
                <input type="text" name="name" required>

                <label for="subject">Subject:</label>
                <input type="text" name="subject" required value="{{$subjects->subject}}">

                <label for="description">Description:</label>
                <textarea name="description"  cols="30" rows="10" required></textarea>

                <div class="btns">
                    <button type="submit" id="btnAddTask">Add</button>
                    <button type="button" class="close" id="btnCancel" onclick="popdownQF2()">Cancel</button>
                </div>        
            </div>
        </form>

        <form class="AddDocs" action="{{route('files.upload', $subjects->id)}}" method="POST" >
            @csrf

            <div class="fillup">
                <input type="file" name="file">

                <div class="btns">
                    <button type="submit" id="btnAddTask" required>Upload</button>
                    <button type="button" class="close" id="btnCancel" onclick="popdownDF()">Cancel</button>
                </div>

            </div>

        </form>
        
    </section>

    <script src="{{ asset('js/FormAdd.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>