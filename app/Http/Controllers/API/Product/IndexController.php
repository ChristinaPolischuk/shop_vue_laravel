<?php

namespace App\Http\Controllers\API\Product;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Http\Requests\Product\StoreRequest;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke() 
    {
      $products = Product::all();
      return ProductResource::collection($products);
    }
}