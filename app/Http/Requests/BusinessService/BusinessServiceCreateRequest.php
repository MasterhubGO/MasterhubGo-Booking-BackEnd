<?php

namespace App\Http\Requests\BusinessService;

use App\Models\Currency;
use Illuminate\Foundation\Http\FormRequest;

class BusinessServiceCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->businesses->pluck('id')->contains($this->route('business_profile'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
			'business_id' => ['required', 'integer', 'exists:business_profiles,id'],
			'title' => ['required', 'string', 'max:150'],
			'currency_id' => ['required', 'integer', 'exists:currencies,id'],
			'price' => ['required', 'decimal:0,3', 'min:0'],
			'description' => ['string', 'max:16383', 'nullable'],
			'duration' => ['required', 'integer', 'min:1'],
			'is_field' => ['required', 'boolean'],
			'user_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }

	public function prepareForValidation(): void
	{
		$this->merge(['business_id' => $this->route('business_profile')]);
	}
}
