<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ShowController extends Controller
{
  public function __invoke(Category $category) 
  {
    return view('category.show', compact('category'));
  }
}
