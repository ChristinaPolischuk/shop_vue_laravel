<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product) 
    {
        $data = $request->validated();
        $product->update($data);

        return view('product.show', compact('product'));
    }
}