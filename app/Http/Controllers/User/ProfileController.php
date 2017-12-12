<?php

namespace Chatty\Http\Controllers\User;

use Auth;
use Chatty\Http\Controllers\Controller;
use Chatty\Models\User;
use Illuminate\Http\Request;

Class ProfileController extends Controller{

    public function getProfile($username){
        $user = User::where('username', $username)->first();

        if(!$user){
            abort(404);
        }

        $statuses = $user->statuses()->notReply()->get();

        return view('Template.profile.index')
            ->with('user', $user)
            ->with('statuses', $statuses)
            ->with('authUserIsFriend', Auth::user()->isFriendsWith($user));
    }

    public function getEdit(){
        return view('Template.profile.edit');
    }

    public function postEdit(Request $request){
        $this->validate($request, [
            'first_name' => 'alpha|max:50',
            'last_name' => 'alpha|max:50',
            'location' => 'max:20',
        ]);

        Auth::user()->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'location' => $request->input('location'),
        ]);

        return redirect()
            ->route('profile.edit')
            ->with('success', 'Your profile has been update!.');
    }

}
