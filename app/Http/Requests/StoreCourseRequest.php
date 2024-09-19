<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'title' => 'required|min:6',
            'category_id' => ['required', 'exists:categories,id'],
            'description' => 'required',
            'price' => 'required|numeric',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096'
        ];
    }
}
