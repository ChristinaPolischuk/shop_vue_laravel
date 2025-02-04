<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
  public function __invoke(UpdateRequest $request, Category $category) 
  {
    $data = $request->validated();
    $category->update($data);

    return view('category.show', compact('category'));
  }
}
