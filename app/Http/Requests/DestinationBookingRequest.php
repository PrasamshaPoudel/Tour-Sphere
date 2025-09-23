<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DestinationBookingRequest extends FormRequest
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
            'type' => 'required|in:destination',
            'destination_id' => 'required|integer|min:1',
            'price_per_person' => 'required|numeric|min:0',
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
            'type.in' => 'Invalid booking type for destination booking.',
            'destination_id.required' => 'Please select a destination.',
            'destination_id.exists' => 'Selected destination does not exist.',
            'price_per_person.required' => 'Price per person is required.',
            'price_per_person.numeric' => 'Price per person must be a valid number.',
            'price_per_person.min' => 'Price per person must be greater than or equal to 0.',
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
}

