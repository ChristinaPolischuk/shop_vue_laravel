<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
  protected $table = 'product_images';
  protected $guarded = false;  // Не защищаем от массового заполнения

  public function getImageUrlAttribute() {
    return url('storage/' . $this->file_path);
  }
}
