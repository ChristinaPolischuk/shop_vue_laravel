<?php

namespace App\Http\Controllers\API\Product;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Resources\Product\IndexProductResource;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\API\Product\IndexRequest;

class IndexController extends Controller
{
    public function __invoke(IndexRequest $request) 
    {
      $data = $request->validated();
      $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);

      $products = Product::filter($filter)->get();
      return IndexProductResource::collection($products);
    }
}