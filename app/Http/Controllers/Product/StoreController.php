<?php

namespace App\Http\Controllers\Product;

use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\ColorProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        // Сохраняем изображение, если оно загружено
        if ($request->hasFile('preview_image')) {
            $data['preview_image'] = Storage::disk('public')->put('/images', $request->file('preview_image'));
        }

        // Извлекаем массивы tags и colors (если их нет, то делаем пустыми)
        $tagsIds = $data['tags'] ?? [];
        $colorsIds = $data['colors'] ?? [];
        unset($data['tags'], $data['colors']);

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

        return redirect()->route('product.index');
    }
}