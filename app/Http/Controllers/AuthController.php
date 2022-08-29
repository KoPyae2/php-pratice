<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store()
    {
        //validation
        $formData = request()->validate([
           'name' => 'required|max:255|min:3',
           'username' => ['required','max:255','min:3',Rule::unique('users','username')],
           'email' => ['required','email',Rule::unique('users','email')],
           'password' => 'required|min:6'
        ]);
        //$formData['password'] = bcrypt($formData['password']);
        $user = User::create($formData);

        //login
        auth()->login($user);
        return redirect('/')->with('success','Welcom '.$user->name);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function post_login()
    {
        $formData = request()->validate([
            'email'=> ['required','email','max:255',Rule::exists('users','email')],
            'password'=>['required','min:6','max:255']
        ],[
            'email.required'=>'Need to input Email !',
            'password.min'=>'Password should be more than 8 characters !'
        ]);

        if(auth()->attempt($formData)){
            if(auth()->user()->is_admin){
                return redirect('/admin/blogs');
            }else{
                return redirect('/')->with('success', 'Welcome back ...');
            }

        }else{
            return redirect()->back()->withErrors([
                'email'=>'user credential wrong',
                'password'=>'Incorrect Password'
            ]);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Bye...');
    }
}