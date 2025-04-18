<?php

namespace App\Http\Requests;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class StudentUpdateProfileRequesrt extends FormRequest
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
            'Age'=>'numeric',
            'School_Name'=>'string',
            'img'=>'image|mimes:png,jpg,jpeg,gif'
        ];
    }
}