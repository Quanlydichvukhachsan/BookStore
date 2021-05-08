<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255|unique:books',
            'weight' => 'required|int',
            'size' =>['required','regex:/^\d+(\.\d{1,2})?$/'],
            'number_pages' => 'required|int',
            'formality' =>'required|string|max:255|min:8',
            'publisher_date' => 'required|date',
            'inputfile' => 'required',
            'price' =>'required|int',
            'editor' =>'required|string|max:1000|min:100',
        ];
    }
}
