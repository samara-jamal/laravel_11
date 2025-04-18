<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=>'required|max:255|min:1|string',
            'email'=>'required|email|unique:users',
            'phone'=>'required|numeric|min:10',
            'password'=>'required|string|max:15|min:5',
            'role' => 'required|in:teacher,student',
            'education_dgree' => 'required_if:role,teacher|string|max:255'
        ];
    }
}