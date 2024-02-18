<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TaskManager;
use App\Models\Subjects;
use App\Models\Quizzes;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudyMaterialController extends Controller
{   

    function task(){
        if(Auth::check()){
            // Retrieve tasks data associated with the authenticated user
            // $tasks = TaskManager::where('user_id', Auth::id())->get();
            $tasks = TaskManager::where('user_id', Auth::id())->orderBy('created_at', 'asc')->get();
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

    function edit($id) {
        $taskID = TaskManager::findOrFail($id);
        $tasks = TaskManager::where('user_id', Auth::id())->orderBy('created_at', 'asc')->get();

        return view('editTask', compact('taskID', 'tasks'));
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


    function quizzes(){
        if(Auth::check()){
            $quizzes = Quizzes::where('user_id', Auth::id())->get();
            return view('quizzes', ['quizzes' => $quizzes]);
        }
        return view('login');
    }

    function quizzesPost(Request $request){
        $data['name'] = $request->name;
        $data['subject'] = $request->subject;
        $data['description'] = $request->description;
        $data['user_id'] = auth()->user()->id;

        $user = Quizzes::create($data);

        return redirect()->route('quizzes');
    }

    function quizView($id){
        $quiz = Quizzes::find($id);
        $questions = Question::where('quiz_id', $id)->get();

        $choices = [];

        foreach($questions as $question){
            $questionChoices = Choice::where('question_id', $question->id)->get();
            $choices[$question->id] = $questionChoices;
        }

        return view('quizview', [
            'quiz' => $quiz,
            'questions' => $questions,
            'choices' => $choices
        ]);
    }

    function questionPost($id, Request $request){
        $question['question_text'] = $request->question_text;
        $question['quiz_id'] = $id;
        $question['user_id'] = Auth::user()->id;

        $user = Question::create($question);
        $questionID = $user->id;

        $choices['correct_choice'] = $request->correct_choice;
        $choices['choice_text_1'] = $request->choice_text_1;
        $choices['choice_text_2'] = $request->choice_text_2;
        $choices['choice_text_3'] = $request->choice_text_3;
        $choices['choice_text_4'] = $request->choice_text_4;
        $choices['user_id'] = Auth::user()->id;
        $choices['question_id'] = $questionID;
        $choices['quiz_id'] = $id;

        $saved = Choice::create($choices);

        return redirect()->route('quizview', ['id' => $id]);
    }
    
    function quizEdit($id){
        $quizID = Quizzes::findOrFail($id);
        $quizzes = Quizzes::where('user_id', Auth::id())->orderBy('created_at', 'asc')->get();

        return view('editQuiz', ['quizzes' => $quizzes], ['quizID' => $quizID] );
    }

    function quizUpdate(Request $request, $id){
        $update['name'] = $request->name;
        $update['subject'] = $request->subject;
        $update['description'] = $request->description;

        $quiz = Quizzes::findOrFail($id);
        $quiz->update($update);
        return redirect()->route('quizzes');
    }

    function quizDelete($id){
        $deletequiz = Quizzes::findOrFail($id);
        $deletechoice = Choice::where('quiz_id', $id)->delete();
        $deletequestions = Question::where('quiz_id', $id)->delete();
        $deletequiz->delete();        

        return redirect()->route('quizzes');
    }

}
