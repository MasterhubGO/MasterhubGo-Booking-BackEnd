<?php

namespace App\Http\Requests\BusinessService;

use App\Models\BusinessService;
use Illuminate\Foundation\Http\FormRequest;

class BusinessServicesQuestionUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $service = $this->route('question')->service;
        return auth()->id() === $service->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'question' => ['sometimes', 'string', 'min:5', 'max:3000'],
            'answer' => ['sometimes', 'string', 'min:5', 'max:3000'],
        ];
    }
}
