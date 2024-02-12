@section('addsubject')
<form class="Add" action="{{ route('repository.post')}}" method="POST">
@csrf
    <div  class="fillup">
        <h1>Add Subject</h1>

        <label for="subject">Subject Name:</label>
        <input type="text" placeholder="Subject" name="subject" required>

        <label for="description">Description:</label>
        <!-- <input type="text" placeholder="Description" name="description" required> -->
        <textarea name="description" cols="30" rows="10" required></textarea>

        <div class="btns">
            <button type="submit" id="btnAddTask" >Add</button>
            <button type="button" class="close" id="btnCancel" onclick="popdown()">Cancel</button>
        </div>
    </div>
    
</form>
@endsection