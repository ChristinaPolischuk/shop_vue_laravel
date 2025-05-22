<?php

namespace App\Http\Controllers\Product;

use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\ColorProduct;
use App\Models\ProductImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product) 
    {
        // Получаем данные из запроса
        $data = $request->validated();

        // Обновляем изображение
        if ($request->hasFile('preview_image')) {
            if ($product->preview_image) {
                Storage::disk('public')->delete($product->preview_image);
            }
            $data['preview_image'] = Storage::disk('public')->put('/images', $request->file('preview_image'));
        }

        // Убираем теги и цвета из $data, чтобы они не попали в update()
        $tags = $data['tags'] ?? [];
        $colors = $data['colors'] ?? [];
        unset($data['tags'], $data['colors']);

        // Обновляем сам продукт
        $product->update($data);

        // Обновляем теги
        ProductTag::where('product_id', $product->id)->delete();
        foreach ($tags as $tagId) {
            ProductTag::firstOrCreate([
                'product_id' => $product->id,
                'tag_id' => $tagId
            ]);
        }

        // Обновляем цвета
        ColorProduct::where('product_id', $product->id)->delete();
        foreach ($colors as $colorId) {
            ColorProduct::firstOrCreate([
                'product_id' => $product->id,
                'color_id' => $colorId
            ]);
        }

        if ($request->hasFile('product_images')) {
          foreach ($request->file('product_images') as $image) {
              $filePath = $image->store('images', 'public');
              ProductImage::create([
                  'product_id' => $product->id,
                  'file_path' => $filePath,
              ]);
          }
        }

        return view('product.show', compact('product'));
    }
}