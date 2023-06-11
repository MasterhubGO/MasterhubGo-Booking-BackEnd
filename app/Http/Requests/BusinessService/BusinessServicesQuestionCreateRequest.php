<?php

namespace App\Http\Requests\BusinessService;

use App\Models\BusinessService;
use Illuminate\Foundation\Http\FormRequest;

class BusinessServicesQuestionCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
		$service = BusinessService::find($this->route('service'));
        return auth()->user()->businesses->pluck('id')->contains($service->businessProfile->id);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
			'service_id' => ['required', 'exists:business_services,id'],
            'question' => ['required', 'string', 'min:5', 'max:3000'],
            'answer' => ['required', 'string', 'min:5', 'max:3000'],
        ];
    }

	public function prepareForValidation(): void
	{
		$this->merge(['service_id' => $this->route('service')]);
	}
}
