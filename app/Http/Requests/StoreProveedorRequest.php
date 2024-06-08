<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class StoreProveedorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'regex:/^[^\d]+$/i', 'max:255'],
            'cuit' => 'required|string|max:11',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es requerido.',
            'name.string' => 'El campo nombre debe ser una cadena de caracteres.',
            'name.regex' => 'El campo nombre no puede contener números.',
            'name.max' => 'El campo nombre no puede tener más de :max caracteres.',
            'cuit.required' => 'El campo CUIT es requerido.',
            'cuit.string' => 'El campo CUIT debe ser una cadena de caracteres.',
            'cuit.max' => 'El campo CUIT no puede tener más de :max caracteres.',
            'telefono.required' => 'El campo teléfono es requerido.',
            'telefono.string' => 'El campo teléfono debe ser una cadena de caracteres.',
            'telefono.max' => 'El campo teléfono no puede tener más de :max caracteres.',
            'email.required' => 'El campo email es requerido.',
            'email.email' => 'El campo email debe ser una dirección de correo electrónico válida.',
            'email.max' => 'El campo email no puede tener más de :max caracteres.',
        ];
    }
}
