<?php

namespace App\Http\Controllers\Tag;

use App\Models\Tag;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
  public function __invoke(Tag $tag) 
  {
    return view('tag.edit', compact('tag'));
  }
}
