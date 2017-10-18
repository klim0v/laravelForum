<?php

namespace App\Http\Controllers;

use App\Message;
use App\Topic;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $messages = Message::when($request->has('topic_id'), function ($query) use ($request) {
            $query->where('topic_id', $request->get('topic_id'));
        })->get();

        return view('messages.index', compact('messages'));
    }

    /**
     * @return $this
     */
    public function create()
    {
        $topics = Topic::all();
        return view('messages.create')->with('topics', $topics);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'text' => 'required',
            'topic_id' => 'required|numeric',
        ]);

        $message = new Message;
        $message->text = $request->get('text');
        $message->topic_id = $request->get('topic_id');
        $message->save();

        return back()->with('success', 'Message has been added');
    }

    /**
     * @param $id
     * @return $this
     */
    public function edit($id)
    {
        $message = Message::findOrFail($id);
        $topics = Topic::all();
        return view('messages.edit')
            ->with('message', $message)
            ->with('topics', $topics);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $this->validate($request, [
            'text' => 'required',
            'topic_id' => 'required|numeric',
        ]);
        $message->text = $request->get('text');
        $message->topic_id = $request->get('topic_id');
        $message->save();

        return redirect()->route('message_list')
            ->with('success','Message has been updated');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->route('message_list')->with('success','Message has been  deleted');
    }
}
