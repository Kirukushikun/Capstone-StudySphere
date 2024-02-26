<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function login(){
        return view('login');
    }

    function signup(){
        return view('signup');
    }

    function loginPost(Request $request){
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with("error", "Invalid email or password.");
    }

function signupPost(Request $request){

    $password = $request->password;
    $confirm = $request->cpassword;

    if($password === $confirm){
        $data['firstname'] = $request->firstname;
        $data['lastname'] = $request->lastname;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->cpassword);

        try {
            $user = User::create($data);
            return redirect()->intended(route('login'));
        } catch (\Illuminate\Database\QueryException $exception) {
            if ($exception->errorInfo[1] === 1062) {
                return redirect(route('signup'))->with("error", "Email already exists. Please use a different email address.");
            }
            return redirect(route('signup'))->with("error", "An error occurred. Please try again later.");
        }
    } else {
        return redirect(route('signup'))->with("error", "Passwords do not match. Please try again.");
    }
    
}

    function updatePass(Request $request){
        $user = User::where('email', $request->email)->first();
        if(!$user){
            return redirect()->back()->with('error', 'No user found with this email address.');
        }

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'The provided old password is incorrect.');
        }

        $npass = $request->npassword;
        $cpass = $request->cpassword;

        if($npass !== $cpass){
            return redirect()->back()->with('error', 'The provided password is not match.');
        }else{
            $user->password = Hash::make($cpass);
            $user->save();
            return redirect()->back()->with('status', 'Password changed successfully.');
        }
        
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->intended(route('login'));
    }

    function submit(ContactRequest $request){
        Mail::to('Iversoncraigg@gmail.com')->send(new ContactMail(
            $request->fName,
            $request->lName,
            $request->email,
            $request->textarea
        ));
        return redirect()->route('/contact')->with('status', 'Email sent!');
    }
}
