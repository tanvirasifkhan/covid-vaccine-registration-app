<?php

namespace App\Http\Requests\VaccineCandidate;

use Illuminate\Foundation\Http\FormRequest;

class RegisterVaccineCandidateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'center_id' => 'required|integer',
            'name' => 'required',
            'email' => 'required|email|unique:vaccine_candidates',
            'phone' => 'required|digits:11|unique:vaccine_candidates',
            'nid' => 'required|unique:vaccine_candidates'
        ];
    }

    /**
     * custom validation message
     */
    public function messages(): array
    {
        return [
            'center_id.required' => 'You need to select a center',
            'center_id.integer' => 'Invalid center id',
            'name.required' => 'What\s your name ?',
            'email.required' => 'Provide an email address',
            'email.email' => 'Invalid email address',
            'email.unique' => 'Someone is using this email address',
            'phone.required' => 'Need your phone number',
            'phone.digits' => 'Phone number has to be 11 digits',
            'phone.unique' => 'Someone is using this phone',
            'nid.required' => 'Provide your NID number',
            'nid.unique' => 'NID already registered'
        ];
    }
}
