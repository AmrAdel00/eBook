<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|string|max:225',
            'author' => 'required|string|max:225',
            'info' => 'required|string',
            'image' => 'required|file|mimes:png,jpg',
            'file' => 'required|file|mimes:pdf',
            'category' => 'required|exists:categories,id',
        ];
    }
}
