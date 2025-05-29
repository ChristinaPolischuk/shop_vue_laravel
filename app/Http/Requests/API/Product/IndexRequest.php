<?php

namespace App\Http\Requests\API\Product;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
  public function authorize(): bool
  {
      return true;
  }

  public function rules(): array
  {
    return [
      'categories' => 'nullable|array',
      'colors' => 'nullable|array',
      'tags' => 'nullable|array',
      'prices' => 'nullable|array',
      'page' => 'required|integer',
    ];
  }
}
