<?php

namespace App\Http\Controllers\API\Product;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Http\Requests\Product\StoreRequest;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Product $product) 
    {
      return new ProductResource($product);
    }
}