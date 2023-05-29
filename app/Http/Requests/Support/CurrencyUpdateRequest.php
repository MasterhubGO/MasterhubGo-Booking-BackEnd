<?php

namespace App\Http\Requests\Support;

use App\Support\Rules\MultipleOf;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CurrencyUpdateRequest extends FormRequest
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
            'alpha_code' => [
				'sometimes', 
				'string', 
				'size:3', 
				Rule::unique('currencies')->ignore($this->route('currency')->id), 
				'uppercase'
			],
            'numeric_code' => [
				'sometimes', 
				'numeric', 
				'digits:3', 
				Rule::unique('currencies')->ignore($this->route('currency')->id),
			],
            'fraction' => ['sometimes', 'integer', 'min:0', new MultipleOf(10)],
            'sign' => ['sometimes', 'string', 'max:2', 'nullable'],
        ];
    }
}
