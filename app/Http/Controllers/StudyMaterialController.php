<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TaskManager;
use App\Models\Subjects;
use App\Models\Quizzes;
use App\Models\Question;
use App\Models\Choice;
use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

// use Kreait\Laravel\Firebase\Facades\FirebaseStorage;
// use Google\Cloud\Storage\StorageClient;

class StudyMaterialController extends Controller
{  
    public function uploadFile($id, Request $request)
    {   
        $data['file_name'] = $request->file;
        $data['subject_id'] = $id;
        $data['user_id'] = auth()->user()->id;

        $user = Files::create($data);

        return redirect()->back()->with('success', 'Files uploaded successfully.');
    }

    // LOAD DASHBOARD
    function dashboard(){
        if(Auth::check()){

            $tasks = TaskManager::where('user_id', Auth::id())->orderBy('created_at', 'asc')->get();
            $quizzes = Quizzes::where('user_id', Auth::id())->orderBy('created_at', 'asc')->get();
            $subjects = Subjects::where('user_id', Auth::id())->orderBy('created_at', 'asc')->get();
            
            foreach($quizzes as $quiz){
                $quizItems = Choice::where('quiz_id', $quiz->id)->count();
                $quiz->items_count = $quizItems;
            }
            
            foreach($subjects as $subject){
                $files = Files::where('subject_id', $subject->id)->count();
                $tasksItems = TaskManager::where('subject', $subject->subject)->count();
                $quizzesItems = Quizzes::where('subject', $subject->subject)->count();

                $subject->items_count = $files + $tasksItems + $quizzesItems;
            }

            return view('dashboard', [
                'tasks' => $tasks,
                'quizzes' => $quizzes,
                'subjects' => $subjects
            ]);
        }
        return view('login');
    }

    //LOAD TASK
    function task(){
        if(Auth::check()){
            $tasks = TaskManager::where('user_id', Auth::id())->orderBy('created_at', 'asc')->get();
            return view('taskmanager', ['tasks' => $tasks]);
        }
        return view('login');
    }

    //ADD TASK
    function taskPost(Request $request){ 

        $data['title'] = $request->title;
        $data['subject'] = $request->subject;
        $data['due_date'] = $request->due_date;
        $data['priority'] = $request->priority;
        $data['status'] = $request->status;

        $data['user_id'] = auth()->user()->id;

        $user = TaskManager::create($data);

        return redirect()->route('taskmanager');
    }

    //DELETE TASK
    function taskDelete(TaskManager $task){
        $task->delete();
        return redirect()->route('taskmanager');
    }

    //EDIT TASK
    function edit($id) {
        $taskID = TaskManager::findOrFail($id);
        $tasks = TaskManager::where('user_id', Auth::id())->orderBy('created_at', 'asc')->get();

        return view('editTask', compact('taskID', 'tasks'));
    }

    //UPDATE TASK
    public function update(Request $request, $id) {

        $validatedData = $request->validate([
            'title' => 'required|string',
            'subject' => 'required|string',
            'due_date' => 'required|date',
            'priority' => 'required|in:least,neutral,prioritize',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        $task = TaskManager::findOrFail($id);

        $task->update($validatedData);

        return redirect()->route('taskmanager')->with('success', 'Task updated successfully');
    }

    //LOAD REPOSITORY
    function repository(){

        if(Auth::check()){
            $subjects = Subjects::where('user_id', Auth::id())->get();
            foreach($subjects as $subject){
                $files = Files::where('subject_id', $subject->id)->count();
                $tasks = TaskManager::where('subject', $subject->subject)->count();
                $quizzes = Quizzes::where('subject', $subject->subject)->count();

                $subject->items_count = $files + $tasks + $quizzes;
            }
            return view('repository', ['subjects' => $subjects]);
        }
        return view('login');
    }

    //ADD REPOSITORY
    function repositoryPost(Request $request){
        
        $data['subject'] = $request->subject;
        $data['description'] = $request->description;
        $data['user_id'] = auth()->user()->id;

        $user = Subjects::create($data);

        return redirect()->route('repository');
    }

    //SUBJECT VIEW WITHIN REPOSITORY 
    function subjectView($id){
        $subjectID = Subjects::find($id);

        $tasks = TaskManager::where('subject', $subjectID->subject)->get();
        $quizzes = Quizzes::where('subject', $subjectID->subject)->get();
        $documents = Files::where('subject_id', $subjectID->id)->get();

        return view('subjectview', [
            'subjects' => $subjectID,
            'tasks' => $tasks,
            'quizzes' => $quizzes,
            'documents' => $documents
        ]);
    }

    //SUBJECT EDIT WITHIN REPOSITORY 
    function subjectEdit($id){
        $edit = Subjects::findOrFail($id);
        $subjects = Subjects::where('user_id', Auth::id())->get();
        return view('editSubject', ['edit' => $edit, 'subjects' => $subjects]);
    }

    //SUBJECT UPDATE WITHIN REPOSITORY 
    function subjectUpdate(Request $request, $id){
        $data['subject'] = $request->subject;
        $data['description'] = $request->description;

        $update = Subjects::findOrFail($id);
        $update->update($data);
        
        return redirect()->route('repository');
    }

    //SUBJECT DELETE WITHIN REPOSITORY 
    function subjectDelete($id){
        $deleteDocs = Files::where('subject_id', $id);
        $deleteDocs->delete();        
        $deletesub = Subjects::findOrFail($id);
        $deletesub->delete();
        return redirect()->route('repository');
    }
    
    //LOAD QUIZZES
    function quizzes(){
        if(Auth::check()){
            $quizzes = Quizzes::where('user_id', Auth::id())->get();
            foreach($quizzes as $quiz){
                $quiz->item_count = Choice::where('quiz_id', $quiz->id)->count();
            }
            return view('quizzes', ['quizzes' => $quizzes]);
        }
        return view('login');
    }

    //ADD QUIZZES
    function quizzesPost(Request $request){
        $data['name'] = $request->name;
        $data['subject'] = $request->subject;
        $data['description'] = $request->description;
        $data['user_id'] = auth()->user()->id;

        $user = Quizzes::create($data);

        return redirect()->route('quizzes');
    }

    //QUIZ VIEW WITHIN QUIZ SECTION
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

    //QUESTION VIEW WITHIN QUIZ SECTION
    function questionPost($id, Request $request){
        $question['question_text'] = $request->question_text;
        $question['quiz_id'] = $id;
        $question['user_id'] = Auth::user()->id;

        $user = Question::create($question);
        $questionID = $user->id;

        $choices['correct_choice'] = $request->correct_choice;
        $choices['choice_text_2'] = $request->choice_text_2;
        $choices['choice_text_3'] = $request->choice_text_3;
        $choices['choice_text_4'] = $request->choice_text_4;
        $choices['user_id'] = Auth::user()->id;
        $choices['question_id'] = $questionID;
        $choices['quiz_id'] = $id;

        $saved = Choice::create($choices);

        return redirect()->route('quizview', ['id' => $id]);
    }

    //QUESTION EDIT WITHIN QUIZ SECTION
    function questionDelete($quiz_id, $question_id ){
        $deleteChoices = Choice::where('question_id', $question_id)->get();
        foreach ($deleteChoices as $choice) {
            $choice->delete();
        }
        $deleteQuestion = Question::findOrFail($question_id);
        $deleteQuestion->delete();

        $quizID = Quizzes::findOrFail($quiz_id);

        return redirect()->route('quizview', ['id' => $quiz_id]);
    }

    //QUESTION EDIT WITHIN QUIZ SECTION   
    function questionEdit($quiz_id, $question_id, $choices_id ){
        $activeQuiz = Quizzes::findOrFail($quiz_id);
        $existingQuestion = Question::where('quiz_id', $quiz_id)->get();
        $existingChoices = [];
        foreach($existingQuestion as $question){
            $questionChoices = Choice::where('question_id', $question->id)->get();
            $existingChoices[$question->id] = $questionChoices;
        }

        $currentQuestion = Question::findOrFail($question_id);
        $currentChoices = Choice::findOrFail($choices_id);
        
        return view('editQuestion', [
            'quiz' => $activeQuiz,
            'questions' => $existingQuestion,
            'choices' => $existingChoices,
            'cquestion' => $currentQuestion,
            'cchoices' => $currentChoices
        ]);
    }

    //QUESTION UPDATE WITHIN QUIZ SECTION
    function questionUpdate($question_id, $choice_id, Request $request){
        $updateQuestion['question_text'] = $request->question_text;
        $question = Question::findOrFail($question_id);
        $question->update($updateQuestion);
        
        $updateChoices['correct_text'] = $request->correct_text;
        $updateChoices['choice_text_2'] = $request->choice_text_2;
        $updateChoices['choice_text_3'] = $request->choice_text_3;
        $updateChoices['choice_text_3'] = $request->choice_text_3;
        $choices = Choice::findOrFail($choice_id);
        $choices->update($updateChoices);

        return redirect()->route('quizview', ['id' => $question->quiz_id]);
    }
    
    //QUIZ EDIT WITHIN QUIZ SECTION
    function quizEdit($id){
        $quizID = Quizzes::findOrFail($id);
        $quizzes = Quizzes::where('user_id', Auth::id())->orderBy('created_at', 'asc')->get();

        return view('editQuiz', ['quizzes' => $quizzes], ['quizID' => $quizID] );
    }

    //QUIZ UPDATE WITHIN QUIZ SECTION
    function quizUpdate(Request $request, $id){
        $update['name'] = $request->name;
        $update['subject'] = $request->subject;
        $update['description'] = $request->description;

        $quiz = Quizzes::findOrFail($id);
        $quiz->update($update);
        return redirect()->route('quizzes');
    }

    //QUIZ DELETE WITHIN QUIZ SECTION
    function quizDelete($id){
        $deletequiz = Quizzes::findOrFail($id);
        $deletechoice = Choice::where('quiz_id', $id)->delete();
        $deletequestions = Question::where('quiz_id', $id)->delete();
        $deletequiz->delete();        

        return redirect()->route('quizzes');
    }

    //QUIZ TAKE WITHIN QUIZ SECTION
    function quizTake($quiz_id){
        $quizzes = Quizzes::findOrFail($quiz_id);
        $questions = Question::where('quiz_id', $quiz_id)->with('choices')->get();
    
        if($questions->isEmpty()){
            return view('quiztake', [
                'quizzes' => $quizzes,
                'error' => "No questions have been added to this quiz yet."
            ]);
        }else{
            return view('quiztake', [
                'questions' => $questions,
                'quizzes' => $quizzes
            ]);
        }
    }
    //EVALUATE QUIZ AFTER TAKING
    public function evaluateQuiz($id, Request $request) {
        $answers = $request->input('answers');
        $score = 0;

        $quizzes = Quizzes::findOrFail($id);
        $questions = Question::where('quiz_id', $id)->count();
        
        foreach ($answers as $question_id => $selected_answer) {
            $question = Choice::findOrFail($question_id);
            if ($question->correct_choice === $selected_answer) {
                $score++;
            }
        }
    
        return view('/score', ['score' => $score,
        'quizzes' => $quizzes,
        'questions' => $questions
        ]);
        
    }

    
    function materialTaskAdd($id, Request $request){
        $subject = Subjects::findOrFail($id);

        $data['title'] = $request->title;
        $data['subject'] = $subject->subject;
        $data['due_date'] = $request->due_date;
        $data['priority'] = $request->priority;
        $data['status'] = $request->status;

        $data['user_id'] = auth()->user()->id;

        $user = TaskManager::create($data);

        return redirect()->route('subjectview', ['id' => $id]);
    }

}
