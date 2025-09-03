<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingForm extends FormRequest
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
            //
            'title'         => ['required', 'string', 'max:255'],
            'cover'         => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
            'detail'        => ['required', 'string'],
            'price'         => ['nullable', 'numeric', 'min:0'],
            'member_price'  => ['nullable', 'numeric', 'min:0'],
            'location'      => ['nullable', 'string', 'max:255'],
            'prepare_by'    => ['required', 'string', 'max:255'],
            'drive_link'    => ['nullable', 'url'],
            'category_id'   => ['required', 'exists:category_trainings,id'],
        ];
    }
}
