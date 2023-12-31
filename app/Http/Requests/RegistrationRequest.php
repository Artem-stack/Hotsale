<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
        'name' => 'required|string|max:255|min:2',
        'surname' => 'required|string|max:255|min:2',
        'email' => 'required|string|email|min:4|max:255|unique:users',
        'password' => 'required|string|min:8|max:32|confirmed',
        ];
    }
}
