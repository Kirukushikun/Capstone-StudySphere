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
                <i class='bx bx-plus' onclick=""></i>
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

    <form class="EditTask" action="{{ route('task.update', $taskID->id) }}" method="POST">

        <div class="fillup">
            @csrf
            @method('PATCH')
            <h1>Edit Task</h1>
            <input type="text" placeholder="Title" name="title" id="title" value="{{ $taskID->title }}" required>
            <input type="text" placeholder="Subject" name="subject" value="{{ $taskID->subject }}" required>

            <label for="due">Due Date:</label>
            <input type="date" name="due_date" id="due_date" value="{{ $taskID->due_date->format('Y-m-d') }}" required>

            <label for="priority">Priority Level:</label>
            <select class="form-control" id="priority" name="priority" required>
                <option value="least" {{ $taskID->priority == 'least' ? 'selected' : '' }}>Least</option>
                <option value="neutral" {{ $taskID->priority == 'neutral' ? 'selected' : '' }}>Neutral</option>
                <option value="prioritize" {{ $taskID->priority == 'prioritize' ? 'selected' : '' }}>Prioritize</option>
            </select>

            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" required>
                <option value="pending" {{ $taskID->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in_progress" {{ $taskID->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ $taskID->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>

            <div class="btns">
                <button type="submit" id="btnAddTask">Update</button>
                <button type="button" class="close" id="btnCancel" onclick="window.location.href='{{route('taskmanager')}}'">Cancel</button>
            </div>
        </div>

    </form>


</body>
</html>