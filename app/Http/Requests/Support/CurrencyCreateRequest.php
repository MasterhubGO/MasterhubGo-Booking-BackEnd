<?php

namespace App\Http\Requests\Support;

use App\Rules\MultipleOf;
use Illuminate\Foundation\Http\FormRequest;

class CurrencyCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'alpha_code' => ['required', 'string', 'size:3', 'unique:currencies', 'uppercase'],
            'numeric_code' => ['required', 'numeric', 'digits:3', 'unique:currencies'],
            'fraction' => ['sometimes', 'integer', 'min:0', new MultipleOf(10)],
            'sign' => ['sometimes', 'string', 'max:2', 'nullable'],
        ];
    }
}
