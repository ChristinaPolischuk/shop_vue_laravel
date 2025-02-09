<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke() 
    {
      $users = User::all();
      return view('user.index', compact('users'));
    }
}