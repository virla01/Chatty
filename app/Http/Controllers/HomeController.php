<?php

namespace Chatty\Http\Controllers;

use Auth;
use Chatty\Models\Status;

Class HomeController extends Controller{

    public function index(){

        if(Auth::check()){

            $statuses = Status::notReply()->where(function($query){
                return $query->where('user_id', Auth::user()->id)
                    ->orWhereIn('user_id', Auth::user()->friends()->pluck('id'));
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);


            return view('Template\timeline\index')
                ->with('statuses', $statuses);
        }

        return view('Template\home');
    }

}
