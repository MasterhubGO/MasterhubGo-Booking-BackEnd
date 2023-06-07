<?php

namespace App\Http\Requests\BusinessService;

use Illuminate\Foundation\Http\FormRequest;

class BusinessServiceUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->id() === $this->route('service')->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
			'title' => ['sometimes', 'string', 'max:150'],
			'price' => ['sometimes', 'decimal:0,3', 'min:0'],
			'currency_id' => ['sometimes', 'integer', 'exists:currencies,id'],
			'description' => ['sometimes', 'string', 'max:16383', 'nullable'],
			'duration' => ['sometimes', 'integer', 'min:1'],
			'is_field' => ['sometimes', 'boolean'],
        ];
    }
}
