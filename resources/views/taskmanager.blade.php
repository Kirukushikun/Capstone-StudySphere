@include('components.sidebar')
@include('components.formAdd')
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

        <div class="taskManagerTable">

            <div class="addTasks">
                <i class='bx bx-plus' id="popupTask" onclick="popupTF()"></i>
            </div>

            <div class="userTasks">
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Subject</th>
                            <th>Due</th>
                            <th>Priority</th>
                            <th>Progress</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td class="Cap">{{ $task->title }}</td>
                                <td>{{ $task->subject }}</td>
                                <td>{{ $task->due_date->format('m/d/Y') }}</td>
                                <td class="Cap">{{ $task->priority }}</td>
                                <td class="Cap">{{ $task->status == 'in_progress' ? 'In Progress' : $task->status }}</td>
                                <td class="btns">

                                    <button id="edit" onclick="location.href='{{ route('task.edit', $task->id) }}'">
                                        <i class='bx bx-pencil'></i>
                                    </button>

                                    <form action="{{route('task.delete', $task->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" id="delete">
                                            <i class='bx bx-trash'></i>
                                            </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        @yield('addtask')
    </section>
    
    <script>

        //ADD FORM
        function popupTF(){
            document.querySelector(".AddTask").classList.add("Active");
        }function popdownTF(){
            document.querySelector(".AddTask").classList.remove("Active");
        }

    </script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>