<?php

namespace App\Http\Controllers\API\Product;

use App\Models\Category;
use App\Models\Color;
use App\Models\Tag;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Http\Requests\Product\StoreRequest;
use Illuminate\Http\Request;

class FilterListController extends Controller
{
  public function __invoke(Product $product) 
  {
    $categories = Category::all();
    $colors = Color::all();
    $tags = Tag::all();

    $maxPrice = Product::orderBy('price', 'DESC')->first()->price;
    $minPrice = Product::orderBy('price', 'ASC')->first()->price;

    $result = [
      'categories' => $categories,
      'colors' => $colors,
      'tags' => $tags,
      'price' => [
        'max' => $maxPrice,
        'min' => $minPrice,
      ]
    ];

    return response()->json($result);
  }
}