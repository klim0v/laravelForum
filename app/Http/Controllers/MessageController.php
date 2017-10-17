<?php

namespace App\Http\Controllers;

use App\Message;
use App\Topic;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $topic = $request->input('topic_id');
        if (!empty($topic)){
            $messages = Message::where(['topic_id' => $topic])->get();
        } else {
            $messages = Message::all();
        }


        return view('messages.index', compact('messages'));
    }

    public function create()
    {
        $topics = Topic::all();
        return view('messages.create', compact('topics'));
    }

    public function store(Request $request)
    {
        $message = $this->validate(request(), [
            'text' => 'required',
            'topic_id' => 'required|numeric',
        ]);

        Message::create($message);

        return back()->with('success', 'Message has been added');
    }

    public function edit($id)
    {
        $message = Message::findOrFail($id);
        $topics = Topic::all();
        return view('messages.edit', compact('message', 'topics','id'));
    }

    public function update(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $this->validate(request(), [
            'text' => 'required',
            'topic_id' => 'required|numeric',
        ]);
        $message->text = $request->get('text');
        $message->topic_id = $request->get('topic_id');
        $message->save();
        return redirect('messages')->with('success','Message has been updated');
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect('messages')->with('success','Message has been  deleted');
    }
}
