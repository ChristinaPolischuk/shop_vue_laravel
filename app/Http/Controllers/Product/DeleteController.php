<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function __invoke(Product $product) 
    {
        // Удаляем все связи в промежуточных таблицах
        $product->tags()->detach(); // если у продукта есть отношение tags
        $product->colors()->detach(); // если у продукта есть отношение colors
        
        // Или, если нет связей many-to-many, можно удалить вручную:
        \App\Models\ProductTag::where('product_id', $product->id)->delete();
        \App\Models\ColorProduct::where('product_id', $product->id)->delete();
        \App\Models\ProductImage::where('product_id', $product->id)->delete(); 

        // Теперь можно удалить сам продукт
        $product->delete();

        return redirect()->route('product.index');
    }
}