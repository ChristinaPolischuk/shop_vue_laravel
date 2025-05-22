<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  protected $table = 'groups';
  protected $guarded = false;

  public function products()
  {
    return $this->hasMany(Product::class, 'group_id', 'id');
  }
}