<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SourceForm extends FormRequest
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

            'images' => ['required', 'array', 'min:1'], // at least 1 file
            'images.*' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png,gif,webp',
                'max:10240' // 10MB per file
            ],
            'detail'      => ['nullable', 'string', 'max:255'],
            'training_id' => ['required', 'exists:trainings,id'],
        //     //
        //     'image' => [
        //     'required',
        //     'file', // generic file rule
        //     'mimes:jpg,jpeg,png,gif,webp,mp4,mov,avi,mkv,wmv',
        //     'max:10240' // max size 10MB
        // ],
        // 'detail'      => ['nullable', 'string', 'max:255'],
        // 'training_id' => ['required', 'exists:trainings,id'],
        ];
    }
}
