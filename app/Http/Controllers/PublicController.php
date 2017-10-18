<?php

namespace App\Http\Controllers;

use App\Category;
use App\Message;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $categories = Category::with('topics', 'topics.messages')->get();

        return view('welcome')->with('categories', $categories);
    }

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
}
