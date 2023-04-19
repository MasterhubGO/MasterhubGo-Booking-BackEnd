<?php

namespace App\Http\Requests\Cabinets;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class BusinessCreateRequest extends FormRequest
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
            'user_id' => ['required', 'integer'],
            'role_id' => ['required', 'integer'],
            'photo' => ['nullable', 'string'],
            'banner' => ['nullable', 'string'],
            'phone' => ['nullable', 'string'],
            'personal_site' => ['nullable', 'string'],
            'services' => ['required', 'array']
        ];
    }
}
