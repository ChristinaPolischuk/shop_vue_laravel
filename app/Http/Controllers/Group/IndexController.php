<?php

namespace App\Http\Controllers\Group;

use App\Models\Group;
use App\Http\Controllers\Controller;
use App\Http\Requests\Group\StoreRequest;
use Illuminate\Http\Request;

class IndexController extends Controller
{
  public function __invoke() 
  {
    $groups = Group::all();
    return view('group.index', compact('groups'));
  }
}
