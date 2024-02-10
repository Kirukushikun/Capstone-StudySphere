@section('addtask')
<form class="Add" action="{{ route('taskmanager.post')}}" method="POST">
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
            <button type="text" class="close" id="btnCancel" onclick="popdown()">Cancel</button>
        </div>
    </div>
    
</form>
@endsection