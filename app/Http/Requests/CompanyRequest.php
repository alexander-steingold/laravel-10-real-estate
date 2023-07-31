<?php

namespace App\Http\Requests;

use App\Models\Job;
use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'website' => $this->sanitizeWebsite($this->website),
        ]);
    }

    /**
     * Sanitize the website attribute, remove "http://" or "https://" from the beginning of the URL.
     *
     * @param string|null $website
     * @return string|null
     */
    protected function sanitizeWebsite(?string $website): ?string
    {
        if ($website) {
            // Remove "http://" or "https://" from the beginning of the URL
            return preg_replace('#^https?://#', '', $website);
        }

        return null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'type' => 'required|string',
            'description' => 'nullable|string|min:10',
            'country_id' => 'required|numeric',
            'city' => 'nullable|string|min:3|max:255',
            'address' => 'nullable|string|min:3|max:255',
            'zip' => 'nullable|string|min:3|max:10',
            'email' => 'required|email|min:9|max:50',
            'phone' => 'nullable|numeric|min:9|max:30',
            'fax' => 'nullable|numeric|min:9|max:30',
            'website' => 'nullable|string|min:3|max:50',
        ];
    }
}
