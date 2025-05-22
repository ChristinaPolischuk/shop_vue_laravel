<?php

namespace App\Http\Controllers\Tag;

use App\Models\Tag;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\UpdateRequest;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Tag $tag) 
    {
        $data = $request->validated();
        $tag->update($data);

        return view('tag.show', compact('tag'));
    }
}