<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIdeaRequest extends FormRequest
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
            'idea' => 'required | string | max:500 | min:10',
            'state' => 'required | in:Pending,Active,Complete',
        ];
    }

    public function messages()
    {
        return [
            'idea.required' => 'Stupid idea',
            'idea.min' => 'To small like your ...',
            'idea.max' => 'To big to be true',
            'idea.string' => 'How?',

            'state.required' => 'Debuged ._.',
            'state.in' => "Don't change the value!"
        ];    
    }
}
