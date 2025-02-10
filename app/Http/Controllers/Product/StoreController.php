<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;

class StoreController extends Controller
{
  public function __invoke(StoreRequest $request)
  {
    $data = $request->validated();

    $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

    $tagsIds = $data['tags'];
    $colorsIds = $data['colors'];
    unset($data['tags'], $data['colors']);

    $product = Product::firstOrCreate([
      'title' => $data['title']
    ], $data);

    foreach($tagsIds as $tagsId) {
      ProductTag::firstOrCreate([
        'product_id' => $product->id,
        'tag_id' => $tagsId
      ]);
    }

    foreach($colorsIds as $colorsId) {
      Color::firstOrCreate([
        'product_id' => $product->id,
        'color_id' => $colorsId
      ]);
    }

    return redirect()->route('product.index');
  }
}
