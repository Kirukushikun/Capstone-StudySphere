<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TaskManager;
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

}
