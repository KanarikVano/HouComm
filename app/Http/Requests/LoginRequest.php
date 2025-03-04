<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Разрешить всем пользователям
    }

    public function rules()
    {
        return [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email обязателен для заполнения.',
            'email.email' => 'Некорректный формат email.',
            'password.required' => 'Пароль обязателен для заполнения.',
        ];
    }
}
