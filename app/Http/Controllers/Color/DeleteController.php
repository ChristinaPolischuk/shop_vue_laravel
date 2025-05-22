<?php

namespace App\Http\Controllers\Color;

use App\Models\Color;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function __invoke(Color $color) 
    {
        $color->delete();

        return redirect()->route('color.index');
    }
}
