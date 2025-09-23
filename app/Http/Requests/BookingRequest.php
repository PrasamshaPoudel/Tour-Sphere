<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => 'required|in:adventure,package,destination,promotional',
            'destination_id' => 'required|integer|min:1',
            'travel_date' => 'required|date|after:today',
            'number_of_people' => 'required|integer|min:1|max:20',
            'special_requests' => 'nullable|string|max:1000',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'type.required' => 'Booking type is required.',
            'type.in' => 'Invalid booking type selected.',
            'destination_id.required' => 'Please select a destination.',
            'destination_id.exists' => 'Selected destination does not exist.',
            'travel_date.required' => 'Travel date is required.',
            'travel_date.date' => 'Please enter a valid date.',
            'travel_date.after' => 'Travel date must be in the future.',
            'number_of_people.required' => 'Number of people is required.',
            'number_of_people.integer' => 'Number of people must be a valid number.',
            'number_of_people.min' => 'At least 1 person is required.',
            'number_of_people.max' => 'Maximum 20 people allowed per booking.',
            'special_requests.max' => 'Special requests cannot exceed 1000 characters.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'type' => 'booking type',
            'destination_id' => 'destination',
            'travel_date' => 'travel date',
            'number_of_people' => 'number of people',
            'special_requests' => 'special requests',
        ];
    }
}

