<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $categories = Category::with('topics', 'topics.messages')->get();

        return view('welcome')->with('categories', $categories);
    }
}
