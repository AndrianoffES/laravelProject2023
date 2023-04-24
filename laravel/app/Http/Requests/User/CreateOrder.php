<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrder extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_name'=>['required', 'string', 'min:2', 'max:100'],
            'phone_number'=>['required', 'string', 'min:11', 'max:30'],
            'email'=>['required', 'string', 'email'],
            'description'=>['required', 'string', 'min:10']
        ];
    }
}
