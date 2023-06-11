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
            'photo' => 'nullable|image|mimes:jpeg,png|max:5120',
            'banner' => 'nullable|image|mimes:jpeg,png|max:5120',
            'phone' => ['nullable', 'string'],
            'personal_site' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'email' => ['nullable', 'email'],
            'profile_description' => ['nullable', 'string'],
            'social_links' => ['nullable', 'string'],
            'verified' => ['boolean'],

            // Master validation
            'first_name' => ['required_if:role_id,1', 'string'],
            'last_name' => ['required_if:role_id,1', 'string'],
            'personal_website' => ['nullable', 'string'],
            'diploma_photos' => ['nullable', 'array', 'max:7'],
            'diploma_photos.*' => ['nullable', 'image', 'mimes:jpeg,png', 'max:5120'],
            'specialization' => ['nullable', 'string'],
            'education' => ['nullable', 'string'],
            'workplace' => ['nullable', 'string'],
            'work_start_date' => ['nullable', 'date'],
            'work_end_date' => ['nullable', 'date', 'after:work_start_date'],
            'position' => ['nullable', 'string'],
            'services' => ['required_if:role_id,1', 'string'],

            // Salon validation
            'salon_name' => ['required_if:role_id,2', 'string'],
            'diploma_photos' => ['nullable', 'array', 'max:7'],
            'diploma_photos.*' => ['nullable', 'image', 'mimes:jpeg,png', 'max:5120'],
            'services' => ['required_if:role_id,2', 'array'],
            'subscriptions' => ['nullable', 'string'],
            'followers' => ['nullable', 'string'],
            'reviews' => ['nullable', 'string'],
            'rating' => ['nullable', 'string'],
            'publications' => ['nullable', 'string'],
            'promotions' => ['nullable', 'string'],
            'personal_info' => ['nullable', 'string'],
            'portfolio_count' => ['nullable', 'integer'],
            'courses' => ['nullable', 'string'],
            'employees' => ['nullable', 'string'],
            'notifications' => ['nullable', 'string'],
        ];
    }
}
