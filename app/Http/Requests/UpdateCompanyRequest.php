<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'email', 'min:5', 'max:255', Rule::unique('companies')->ignore($this->company->id, 'id')],
            'website' => ['nullable', 'min:5', 'max:255'],
            'img' => ['image', 'max:5000', 'nullable'],
        ];
    }
}
