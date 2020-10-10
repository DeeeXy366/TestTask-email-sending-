<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3|max:30|unique:users',
            'surname' => 'required|min:3|max:70',
            'email' => 'required|email|unique:users',
        ];
    }
    public function messages()
    {
        return [
            'name.required' =>'Поле name не должно быть пустым',
            'name.min' =>'Поле name должно иметь больше 3-х символов',
            'name.max' =>'Поле name должно иметь меньше 30-и символов',
            'name.unique' => 'Такое имя уже существует',
            'surname.required' =>'Поле surname должно быть заполненно',
            'surname.min' =>'Поле surname должно иметь больше 3-х символов',
            'surname.max' =>'Поле surname должно иметь меньше 70-и символов',
            'email.required' =>'Поле email должно быть заполненно',
            'email.email' =>'Поле email указонно не верно',
            'email.unique' => 'Такой email уже зарегистрирован',
        ];
    }

}
