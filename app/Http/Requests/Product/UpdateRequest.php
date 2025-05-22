<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
      return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
      return [
        'title' => 'required|string',
        'description' => 'nullable|string',
        'content' => 'nullable|string',
        'price' => 'nullable|numeric',
        'old_price' => 'nullable|numeric',
        'count' => 'nullable|integer',
        'category_id' => 'nullable|exists:categories,id',
        'group_id' => 'nullable|exists:groups,id',
        'tags' => 'nullable|array',
        'tags.*' => 'exists:tags,id',
        'colors' => 'nullable|array',
        'colors.*' => 'exists:colors,id',
        'preview_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ];
    }
}
