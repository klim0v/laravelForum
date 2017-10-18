<?php

namespace App\Http\Controllers;

use App\Category;
use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index(Request $request)
    {
        $topics = Topic::when($request->has('category_id'), function ($query) use ($request) {
            $query->where('category_id', $request->category_id);
        })->get();

        return view('topics.index')->with('topics', $topics);
    }

    public function create()
    {
        $categories = Category::all();
        return view('topics.create')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'category_id' => 'required|numeric',
        ]);

        $message = new Topic;
        $message->title = $request->get('title');
        $message->category_id = $request->get('category_id');
        $message->save();

        return back()->with('success', 'Topic has been added');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $topic = Topic::findOrFail($id);
        return view('topics.edit')->with('topic', $topic)
            ->with('categories', $categories);
    }

    public function update(Request $request, $id)
    {
        $topic = Topic::findOrFail($id);
        $this->validate(request(), [
            'title' => 'required',
            'category_id' => 'required|numeric',
        ]);
        $topic->title = $request->get('title');
        $topic->category_id = $request->get('category_id');
        $topic->save();
        return redirect('topics')->with('success','Topic has been updated');
    }

    public function destroy($id)
    {
        $topic = Topic::findOrFail($id)->delete();
        return redirect()-route('topic_list')->with('success','Category has been  deleted');
    }
}
