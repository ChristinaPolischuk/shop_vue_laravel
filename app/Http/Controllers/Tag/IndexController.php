<?php

namespace App\Http\Controllers\Tag;

use App\Models\Tag;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke() 
    {
        $tags = Tag::all();
        return view('tag.index', compact('tags'));
    }
}