<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomFormRequest extends FormRequest
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
            'category_id' => [
                'required',
                'integer'
            ],
            'name' => [
                'nullable', 
                'string',
            ],
            'description' => [
                'nullable',
                'string',
            ],
            'price' => [
                'required',
                'numeric',
                'min:0'
            ],
            'promo_rate' => [
                'nullable',
                'numeric',
                'min:0'
            ],
            'no_breakfast_price' => [
                'nullable',
                'numeric',
                'min:0'
            ],
            'max_guests' => [
                'required',
                'numeric',
                'min:1'
            ],
            'num_beds' => [
                'required',
                'numeric',
                'min:1'
            ],
            'amenity' => [
                'nullable',
                'array'
            ],
            'amenity.*' => [
                'exists:amenity, id'
            ],
            'images' => [
                'nullable',
                'array'
            ],
            'images.*' => [
                'image',
                'max:2048',
                'mimes:jpeg,png,jpg,gif,svg'
            ]

        ];
    }
}