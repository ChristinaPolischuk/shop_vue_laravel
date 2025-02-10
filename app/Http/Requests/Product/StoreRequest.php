<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
  public function authorize(): bool
  {
      return true;
  }

  public function rules(): array
  {
    return [
    'title' => 'required|string',
    'description' => 'required',
    'content' => 'required',
    'preview_image' => 'required',
    
    'price' => 'required',
    'count' => 'required',
    'is_published' => 'nullable',
    'category_id' => 'nullable',
    'tags' => 'nullable|array',
    'colors' => 'nullable|array'
    ];
  }
}
