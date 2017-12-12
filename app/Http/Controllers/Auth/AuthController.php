<?php

namespace Chatty\Http\Controllers\Auth;

use Auth;
use Chatty\Http\Controllers\Controller;
use Chatty\Models\User;
use Illuminate\Http\Request;

Class AuthController extends Controller{

        public function getSignup(){
            return view('Template.auth.signup');
        }

        public function postSignup(Request $request){
            $this->validate($request,[
                'email' => 'required|unique:users|email|max:255',
                'username' => 'required|unique:users|alpha_dash|max:20',
                'password' => 'required|min:6',
            ]);

            User::create([
                'email' => $request->input('email'),
                'username' => $request->input('username'),
                'password' => bcrypt($request->input('password')),
            ]);

            return redirect()->route('home')->with('success', 'Your account has been create and you can now sign in.');
        }

        public function getSignin(){
            return view('Template.auth.signin');
        }

        public function postSignin(Request $request){
            $this->validate($request,[
                'email' => 'required',
                'password' => 'required',
            ]);

            if(!Auth::attempt($request->only(['email','password']),$request->has('remember'))){
                return redirect()->back()->with('error', 'Could not sign you in with those detail.');
            }

            return redirect()->route('home')->with('success', 'You are now signed in.');
        }

        public function getSignout(){
            Auth::logout();
            return redirect()->route('home')->with('success', 'You have successfully closed the session.');
        }

    }
