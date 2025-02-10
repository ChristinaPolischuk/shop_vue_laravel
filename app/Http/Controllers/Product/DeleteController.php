<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function __invoke(Product $product) 
    {
        $product->delete();

        return redirect()->route('product.index');
    }
}
