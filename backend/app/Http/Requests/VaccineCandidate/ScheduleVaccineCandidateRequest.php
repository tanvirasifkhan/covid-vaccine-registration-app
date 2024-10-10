<?php

namespace App\Http\Requests\VaccineCandidate;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleVaccineCandidateRequest extends FormRequest
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
            'scheduled_at' => 'required|date_format:Y-m-d'
        ];
    }

    /**
     * custom validation messages
     */
    public function messages(): array
    {
        return [
            'scheduled_at.required' => 'Which day you are scheduling on ?',
            'scheduled_at.date_format' => 'Date format should be in YEAR-month-day format',
        ];
    }
}
