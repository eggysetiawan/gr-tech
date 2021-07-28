<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2', 'max:255', 'unique:companies,name'],
            'email' => ['required', 'email', 'min:5', 'max:255', 'unique:companies,email'],
            'website' => ['nullable', 'min:5', 'max:255'],
            'img' => ['image', 'max:2000', 'nullable'],
        ];
    }

    public function attributes(): array
    {
        return [
            'img' => 'Logo'
        ];
    }
}
