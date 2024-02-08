<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudyMaterialController extends Controller
{
    public function dashboard(){
        return view('dashboard');
    }

    public function taskmanager(){
        return view('taskmanager');
    }
}
