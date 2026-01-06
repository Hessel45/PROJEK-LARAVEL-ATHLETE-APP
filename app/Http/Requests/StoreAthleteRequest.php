<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAthleteRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:5', 'max:40'],
            'country' => ['required', 'string', 'min:5', 'max:40'],
            'sport' => ['required', 'string', 'min:5', 'max:40'],
            'birthdate' => ['required', 'date', 'before:-15 years'],
            'debut' => ['required', 'date', 'before:today'],
            'photo' => ['required', 'image', 'max:2048'],
        ];
    }
}
