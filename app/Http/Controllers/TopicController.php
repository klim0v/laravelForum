<?php

namespace App\Http\Controllers;

use App\Category;
use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->input('category_id');
        if (!empty($category)){
            $topics = Topic::where(['category_id' => $category])->get();
        } else {
            $topics = Topic::all();
        }
        return view('topics.index', compact('topics'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('topics.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $topic = $this->validate(request(), [
            'title' => 'required',
            'category_id' => 'required|numeric',
        ]);

        Topic::create($topic);

        return back()->with('success', 'Topic has been added');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $topic = Topic::findOrFail($id);
        return view('topics.edit',compact('topic', 'categories', 'id'));
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
        $topic = Topic::findOrFail($id);
        $topic->delete();
        return redirect('topics')->with('success','Category has been  deleted');
    }
}
