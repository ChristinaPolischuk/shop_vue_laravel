<?php

namespace App\Http\Requests\Color;

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
            'title' => ['required', 'regex:/^([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/']
        ];
    }
}
