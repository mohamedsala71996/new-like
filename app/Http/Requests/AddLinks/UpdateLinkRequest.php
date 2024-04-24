<?php

namespace App\Http\Requests\AddLinks;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLinkRequest extends FormRequest
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
            'attachment' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'place' => 'required|in:1,2,3,4',
            'status' => 'required|in:0,1',
            'color' => 'string|max:7', 
            'second' => 'integer|min:1', 
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'name.string' => 'حقل الاسم يجب أن يكون نصاً.',
            'name.max' => 'حقل الاسم يجب ألا يزيد طوله عن 255 حروف.',
            'company_name.required' => 'حقل اسم الشركة مطلوب.',
            'color.string' => 'حقل اللون يجب أن يكون نصاً.',
            'second.integer' => 'حقل الثانية يجب أن يكون عدداً صحيحاً.',
            'second.min' => 'حقل الثانية يجب أن يكون على الأقل .',
        ];
    }
}
