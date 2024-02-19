<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\StudyMaterialController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::patch('/forgot', [AuthManager::class, 'updatePass'])->name('update.password');

Route::get('/signup', [AuthManager::class, 'signup'])->name('signup');
Route::post('/signup', [AuthManager::class, 'signupPost'])->name('signup.post');

Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::get('/taskmanager', [StudyMaterialController::class, 'task'])->name('taskmanager');
Route::post('/taskmanager', [StudyMaterialController::class, 'taskPost'])->name('taskmanager.post');
Route::delete('/taskmanager/{task}', [StudyMaterialController::class, 'taskDelete'])->name('task.delete');

// Out of this world functions
Route::get('task/edit/{id}', [StudyMaterialController::class, 'edit'])->name('task.edit');
Route::patch('task/{id}', [StudyMaterialController::class, 'update'])->name('task.update');


Route::get('/repository', [StudyMaterialController::class, 'repository'])->name('repository');
Route::post('/repository', [StudyMaterialController::class, 'repositoryPost'])->name('repository.post');


Route::get('subject/{id}', [StudyMaterialController::class, 'subjectEdit'])->name('subject.edit');
Route::patch('subject/{id}', [StudyMaterialController::class, 'subjectUpdate'])->name('subject.update');
Route::delete('subject/{id}', [StudyMaterialController::class, 'subjectDelete'])->name('subject.delete');

Route::get('/quizzes', [StudyMaterialController::class, 'quizzes'])->name('quizzes');
Route::post('/quizzes', [StudyMaterialController::class, 'quizzesPost'])->name('quizzes.post');

Route::get('quiz/edit/{id}', [StudyMaterialController::class, 'quizEdit'])->name('quiz.edit');
Route::patch('quiz/{id}', [StudyMaterialController::class, 'quizUpdate'])->name('quiz.update');
Route::delete('quizzes/{id}', [StudyMaterialController::class, 'quizDelete'])->name('quiz.delete');

Route::get('/quizview/{id}', [StudyMaterialController::Class, 'quizView'])->name('quizview');
Route::get('/subjectview/{id}', [StudyMaterialController::class, 'subjectView'])->name('subjectview');

Route::post('/quizview/{id}', [StudyMaterialController::Class, 'questionPost'])->name('question.post');
Route::delete('question/{quiz_id}/{question_id}', [StudyMaterialController::Class, 'questionDelete'])->name('question.delete');


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
});

Route::get('/studymaterial', function () {
    if(Auth::check()){
        return view('/dashboard');
    }
    return view('login');
})->name('studymaterials');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/calendar', function(){
    if(Auth::check()){
        return view('/calendar');
    }
    return view('login');
});

Route::get('/forgot', function() {
    return view('forgot');
});