@section('addtask')
<form class="AddTask" action="{{ route('taskmanager.post')}}" method="POST">
    @csrf
    <div  class="fillup">
        <h1>Add Task</h1>
        <input type="text" placeholder="Title" name="title" required>
        <input type="text" placeholder="Subject" name="subject" required>

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
            <button type="button" class="close" id="btnCancel" onclick="popdownTF()">Cancel</button>
        </div>
    </div>
    
</form>
@endsection

@section('addsubject')
<form class="AddSubject" action="{{ route('repository.post')}}" method="POST">
    @csrf
    <div  class="fillup">
        <h1>Add Subject</h1>

        <label for="subject">Subject Name:</label>
        <input type="text" placeholder="Subject" name="subject" required>

        <label for="description">Description:</label>
        <textarea name="description" cols="30" rows="10" required></textarea>

        <div class="btns">
            <button type="submit" id="btnAddTask" >Add</button>
            <button type="button" class="close" id="btnCancel" onclick="popdownSF()">Cancel</button>
        </div>
    </div>
    
</form>
@endsection

@section('addquiz')
<form class="AddQuiz" action="{{ route('quizzes.post') }}" method="POST">
    @csrf 

    <div class="fillup">
        <h1>Add Quiz</h1>
        <label for="name">Quiz Name:</label>
        <input type="text" name="name" required>

        <label for="subject">Subject:</label>
        <input type="text" name="subject" required>

        <label for="description">Description:</label>
        <textarea name="description"  cols="30" rows="10" required></textarea>

        <div class="btns">
            <button type="submit" id="btnAddTask">Add</button>
            <button type="button" class="close" id="btnCancel" onclick="popdownQF()">Cancel</button>
        </div>        
    </div>

</form>
@endsection