<?php

namespace App\Http\Controllers\Color;

use App\Models\Color;
use App\Http\Controllers\Controller;
use App\Http\Requests\Color\StoreRequest;

class StoreController extends Controller
{
  public function __invoke(StoreRequest $request)
  {
    $data = $request->validated();
    Color::firstOrCreate($data);

    return redirect()->route('color.index');
  }
}
