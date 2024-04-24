<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [
        'description' => 'required|string|max:255',
        'link' => 'required|url|unique:works,link',
        ];
    }

    public function messages(): array
{
    return [
        'description.required' => 'حقل الوصف مطلوب',
        'description.string' => 'يجب أن يكون الوصف نصيًا',
        'description.max' => 'الوصف يجب ألا يتجاوز 255 حرفًا',
        'link.required' => 'حقل الرابط مطلوب',
        'link.url' => 'يجب أن يكون الرابط صالحًا',
        'link.unique' => 'الرابط موجود مسبقًا',
    ];
}
}
