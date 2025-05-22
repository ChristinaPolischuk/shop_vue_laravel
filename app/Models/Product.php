<?php

namespace App\Models;

use App\Models\Traits\Filterable; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use Filterable;

    protected $table = 'products';
    protected $guarded = false;  // Разрешаем массовое заполнение

    public function group(): BelongsTo
    {
      return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function category() {
      return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getImageUrlAttribute() {
      return url('storage/' . $this->preview_image);
    }

    // Определяем связь многие-ко-многим с тегами
    public function tags(): BelongsToMany
    {
      return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    }

    // Определяем связь многие-ко-многим с цветами
    public function colors(): BelongsToMany
    {
      return $this->belongsToMany(Color::class, 'color_products', 'product_id', 'color_id');
    }

    public function productImages()
    {
      return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
}
