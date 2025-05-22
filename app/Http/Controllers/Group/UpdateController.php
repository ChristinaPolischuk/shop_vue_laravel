<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Http\Requests\Group\UpdateRequest;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
  public function __invoke(UpdateRequest $request, Group $group) 
  {
    $data = $request->validated();
    $group->update($data);

    return view('group.show', compact('group'));
  }
}
