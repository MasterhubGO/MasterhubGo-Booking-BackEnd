<?php

namespace App\Http\Requests\Cabinets;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string'],
            'user_role' => ['required', Rule::in(['buyer', 'seller'])],
            'email' => ['nullable', 'email'],
            'gender' => ['required', Rule::in(['male', 'female'])]
        ];
    }
}
