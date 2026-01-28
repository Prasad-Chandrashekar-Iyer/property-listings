<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:Apartment,House,Commercial',
            'price' => 'required|numeric|between:0,99999999.99',
            'location' => 'required|string|max:255',
            'status' => 'required|in:Available,Sold',
            'image' => 'sometimes|image|max:2048',
        ];
    }
}
