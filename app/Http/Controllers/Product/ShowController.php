<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
  public function __invoke(Product $product) 
  {
    return view('product.show', compact('product'));
  }
}