<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MesssageController extends Controller
{
    public function create()
    {
        return view("contact");
    }
    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'name'=>'required',
            'subject'=>'required',
            'message'=>'required'
        ]);
        $m=new Message();
        $m->name=$request->input('name');
        $m->mail=$request->input('email');
        $m->sub=$request->input('subject');
        $m->msg=$request->input('message');
        $m->save();
        return view("contact");
    }

    public function show()
    {
        $msg = Message::all();
        
        return view('shopmessages')->with('msg',$msg);
    }
}
