<?php

namespace App\Http\Requests\Admin\News;

use App\Enums\News\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class Edit extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function getCategoryIds():array
    {
        return (array) $this->validated('category');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {      // dd($this->request);
        return [
            'title'=>['required', 'string', 'min:3', 'max:100'],
            'author' => ['nullable', 'string', 'min:2', 'max:100'],
            'status' => ['required', new Enum(StatusEnum::class)],
            'image' => ['nullable', 'image', 'mimes:jpg, bmp, png'],
            'body' => ['nullable', 'string'],
            'category'=>['required', 'array'],
            'category.*' => ['integer', 'exists:categories,id']
        ];
    }
}
