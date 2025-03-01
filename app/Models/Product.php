<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = false;  // Разрешаем массовое заполнение

    public function category() {
      return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getImageUrlAttribute() {
      return url('storage/' . $this->preview_image);
    }

    // // Определяем связь многие-ко-многим с тегами
    // public function tags(): BelongsToMany
    // {
    //     return $this->belongsToMany(Tag::class, 'product_tags');
    // }

    // // Определяем связь многие-ко-многим с цветами
    // public function colors(): BelongsToMany
    // {
    //     return $this->belongsToMany(Color::class, 'color_products');
    // }
}
