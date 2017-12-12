<?php

namespace Chatty\Http\Controllers\Friend;

use Chatty\Http\Controllers\Controller;
use Auth;
use Chatty\Models\User;
use Illuminate\Http\Request;

Class FriendController extends Controller{

    public function getindex(){
        $friends = Auth::user()->friends();
        $requests = Auth::user()->friendRequests();

        return view('Template.friend.index')
        ->with('friends', $friends)
        ->with('requests', $requests);
    }

    public function getAdd($username){
        $user = User::where('username', $username)->first();

        if(!$user){
            return redirect()
                ->route('home')
                ->with('danger', 'That user could not be found.');
        }

        if(Auth::user()->id === $user->id){
            return redirect()->route('home');
        }

        if(Auth::user()->hasFriendRequestPending($user) || $user->hasFriendRequestPending(Auth::user())){
            return redirect()
                ->route('profile.index',['username' => $user->username])
                ->with('success', 'Friend request already pending.');
        }

        if(Auth::user()->isFriendsWith($user)){
            return redirect()
                ->route('profile.index',['username' => $user->username])
                ->with('success', 'You are alredy friends.');
        }

        Auth::user()->addFriend($user);

        return redirect()
            ->route('profile.index',['username' => $username])
            ->with('info', 'Friend request send.');
    }

    public function getAccept($username){
        $user = User::where('username', $username)->first();

        if(!$user){
            return redirect()
                ->route('home')
                ->with('danger', 'That user could not be found.');
        }

        if(!Auth::user()->hasFriendRequestReceived($user)){
            return redirect()->route('home');
        }

        Auth::user()->acceptFriendRequest($user);

        return redirect()
        ->route('profile.index',['username' => $username])
        ->with('info', 'Friend request accepted.');
    }

    public function postDelete($username){
        $user = User::where('username', $username)->first();

        if(!Auth::user()->isFriendsWith($user)){
            return redirect()->back();
        }

        Auth::user()->deleteFriend($user);
        return redirect()->back()->with('success', 'Friend delete!.');
    }

}
