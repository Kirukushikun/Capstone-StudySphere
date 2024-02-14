<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TaskManager;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudyMaterialController extends Controller
{   

    function task(){
        if(Auth::check()){
            // Retrieve tasks data associated with the authenticated user
            $tasks = TaskManager::where('user_id', Auth::id())->get();
            // Return the taskmanager view with filtered tasks data
            return view('taskmanager', ['tasks' => $tasks]);
        }
        return view('login');
    }
    function taskPost(Request $request){ // Add Request parameter to the function

        //names should be the same as the column in database tble
        $data['title'] = $request->title;
        $data['subject'] = $request->subject;
        $data['due_date'] = $request->due_date;
        $data['priority'] = $request->priority;
        $data['status'] = $request->status;

        // Add user ID to the validated data
        $data['user_id'] = auth()->user()->id;

        // Create the task using the validated data
        $user = TaskManager::create($data);

        // Redirect the user to the task manager page
        return redirect()->route('taskmanager');
    }

    function taskDelete(TaskManager $task){
        $task->delete();
        return redirect()->route('taskmanager');
    }

    function edit($id)
    {
        $task = TaskManager::findOrFail($id);
        $tasks = TaskManager::where('user_id', Auth::id())->get();

        return view('editTask', compact('task', 'tasks'));
    }

    public function update(Request $request, $id) {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string',
            'subject' => 'required|string',
            'due_date' => 'required|date',
            'priority' => 'required|in:least,neutral,prioritize',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        // Find the task by ID
        $task = TaskManager::findOrFail($id);

        // Update the task with the validated data
        $task->update($validatedData);

        // Redirect the user back to the task manager page
        return redirect()->route('taskmanager')->with('success', 'Task updated successfully');
    }


    function repository(){

        if(Auth::check()){
            $subjects = Subjects::where('user_id', Auth::id())->get();
            return view('repository', ['subjects' => $subjects]);
        }
        return view('login');
    }

    function repositoryPost(Request $request){
        
        $data['subject'] = $request->subject;
        $data['description'] = $request->description;
        $data['user_id'] = auth()->user()->id;

        $user = Subjects::create($data);

        return redirect()->route('repository');

    }

    function subjectView($id){
        $subject = Subjects::find($id);

        return view('subjectview', ['subject' => $subject]);
    }

}
