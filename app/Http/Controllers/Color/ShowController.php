<?php

namespace App\Http\Controllers\Color;

use App\Models\Color;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
  public function __invoke(Color $color) 
  {
    return view('color.show', compact('color'));
  }
}