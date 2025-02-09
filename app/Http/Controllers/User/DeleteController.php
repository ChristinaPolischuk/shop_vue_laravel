<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
  public function __invoke(User $user) 
  {
    $user->delete();

    return redirect()->route('user.index');
  }
}
