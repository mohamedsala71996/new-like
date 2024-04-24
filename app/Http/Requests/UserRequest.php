<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'roles' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'حقل الاسم مطلوب',
            'roles.required' => 'حقل الاسم مطلوب',
            'email.required' => 'حقل البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني يجب أن يكون عنوان بريد صحيح',
            'password.required' => 'حقل كلمة المرور مطلوب',
            'password.min' => 'يجب أن تكون كلمة المرور على الأقل 8 أحرف',
            'photo.image' => 'يجب أن يكون الملف المحدد صورة',
            'photo.mimes' => 'يجب أن تكون الصورة من نوع: jpeg، png، jpg، gif',
            'photo.max' => 'يجب ألا يتجاوز حجم الصورة 2 ميجا بايت',
        ];
    }
}
