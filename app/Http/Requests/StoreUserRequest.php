<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
                'email' => 'required|email',
                'password_1' => ['required',"regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/"],
                'password_2' => ['required',"regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/"],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Se requiere un email',
            'email.email' => 'Email no es valido',
            'password_1.required' => 'Se requiere una contraseña',
            'password_1.regex' => 'Minimo 8 caracteres, una letra mayúscula, un caracter especial', 
            'password_2.required' => 'Se requiere la confirmacion de la contraseña',
            'password_2.regex' => 'La confirmación de la contraseña no es válida',
        ];
    }
}