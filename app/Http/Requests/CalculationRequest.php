<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculationRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Разрешить всем авторизованным пользователям
    }

    public function rules()
    {
        return [
            'tariff_id' => 'required|exists:tariffs,id',
            'amount' => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'tariff_id.required' => 'Тариф обязателен для выбора.',
            'tariff_id.exists' => 'Выбранный тариф не существует.',
            'amount.required' => 'Количество обязательно для заполнения.',
            'amount.numeric' => 'Количество должно быть числом.',
            'amount.min' => 'Количество не может быть отрицательным.',
        ];
    }
}
