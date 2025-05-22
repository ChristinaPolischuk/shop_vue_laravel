<?php

namespace App\Http\Controllers\Product;

use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\ProductImage;
use App\Models\ColorProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        //dd($data);

        // Сохраняем изображение, если оно загружено
        // if ($request->hasFile('preview_image')) {
        //   $data['preview_image'] = Storage::disk('public')->put('/images', $request->file('preview_image'));
        // }

        $productImages = $data['product_images'];
        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

        // Извлекаем массивы tags и colors (если их нет, то делаем пустыми)
        $tagsIds = $data['tags'] ?? [];
        $colorsIds = $data['colors'] ?? [];
        unset($data['tags'], $data['colors'], $data['product_images']);

        // Создаём продукт
        $product = Product::create($data);

        // Добавляем теги и цвета
        foreach ($tagsIds as $tagId) {
            ProductTag::firstOrCreate([
                'product_id' => $product->id,
                'tag_id' => $tagId
            ]);
        }

        foreach ($colorsIds as $colorId) {
            ColorProduct::firstOrCreate([
                'product_id' => $product->id,
                'color_id' => $colorId
            ]);
        }

        foreach ($productImages as $productImage) {
          $currentImagesCount = ProductImage::where('product_id', $product->id)->count();

          if($currentImagesCount > 3) continue;

          $filePath = Storage::disk('public')->put('/images', $productImage);
          ProductImage::create([
            'product_id' => $product->id,
            'file_path' => $filePath
          ]);
        }

        return redirect()->route('product.index');
    }
}