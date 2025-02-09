<?php

namespace App\Http\Controllers\Tag;

use App\Models\Tag;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
  public function __invoke(Tag $tag) 
  {
    return view('tag.show', compact('tag'));
  }
}