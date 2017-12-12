<?php

namespace Chatty\Http\Controllers\Status;

use Auth;
use Chatty\Http\Controllers\Controller;
use Chatty\Models\User;
use Chatty\Models\Status;
use Illuminate\Http\Request;

Class StatusController extends Controller{

    public function postStatus(Request $request){
        $this->validate($request, [
            'status' => 'required|max:1000',
        ]);

        Auth::user()->statuses()->create([
            'body' => $request->input('status'),
        ]);

        return redirect()
            ->route('home')
            ->with('info', 'Status posted!.');
    }

    public function postReply(Request $request, $statusId){
        $this->validate($request,[
            "reply-{$statusId}" => 'required|max:1000',
        ],[
            'required' => 'The reply body is required.'
        ]);

       $status = Status::notReply()->find($statusId);

        if(!$status){
            return redirect()->route('home');
        }

        if(!Auth::user()->isFriendsWith($status->user) && Auth::user()->id !== $status->user->id){
            return redirect()->route('home');
        }

        $reply = Status::create([
            'body' => $request->input("reply-{$statusId}"),
        ])->user()->associate(Auth::user());

        $status->replies()->save($reply);

        return redirect()->back();

    }

    public function getLike($statusId){
        $status = Status::find($statusId);

        if(!$status){
            return redirect()->route('home');
        }

        if(!Auth::user()->isFriendsWith($status->user)){
            return redirect()->route('home');
        }

        if(Auth::user()->hasLikedStatus($status)){
            dd('as already liked');
            return redirect()->back();
        }

        $like = $status->likes()->create([]);
        Auth::user()->likes()->save($like);

        return redirect()->back();
    }

}
