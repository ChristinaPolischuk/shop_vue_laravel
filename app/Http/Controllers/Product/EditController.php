<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Color;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function __invoke(Product $product) 
    {
        $categories = Category::all() ?? collect(); 
        $tags = Tag::all() ?? collect();
        $colors = Color::all() ?? collect();

        return view('product.edit', compact('product', 'categories', 'tags', 'colors'));
    }
}
