<?php

namespace App\Http\Requests\AddLinks;

use Illuminate\Foundation\Http\FormRequest;

class CreateLinkRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'url' => 'required|url',
            'attachment' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'place' => 'required|in:1,2,3,4',
            'status' => 'required|in:0,1',
            'color' => 'string',
            'second' => 'integer|min:1',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'حقل :attribute مطلوب.',
            'string' => 'حقل :attribute يجب أن يكون نصاً.',
            'max' => [
                'string' => 'حقل :attribute يجب ألا يزيد طوله عن :max حروف.',
            ],
            'url' => 'حقل :attribute يجب أن يكون عنوان URL صالحاً.',
            'image' => 'حقل :attribute يجب أن يكون صورة.',
            'mimes' => 'حقل :attribute يجب أن يكون ملف من نوع: :values.',
            'in' => 'حقل :attribute المحدد غير صالح.',
            'integer' => 'حقل :attribute يجب أن يكون عدداً صحيحاً.',
            'min' => [
                'numeric' => 'حقل :attribute يجب أن يكون على الأقل :min.',
            ],
        ];
    }
}
