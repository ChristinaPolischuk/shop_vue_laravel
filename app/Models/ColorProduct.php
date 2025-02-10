<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColorProduct extends Model
{
  protected $table = 'color_products';
  protected $guarded = false;  // Не защищаем от массового заполнения
}
