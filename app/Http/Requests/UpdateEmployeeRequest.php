<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (!auth()->check()) {
            return false;
        }
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
            'company' => ['required', 'int', 'in:' . implode(",", Company::availableCompany())],
            'first_name' => ['required', 'min:1', 'max:255', 'string'],
            'last_name' => ['required', 'min:1', 'max:255', 'string'],
            'email' => ['nullable', 'email', Rule::unique('employees')->ignore($this->employee->id, 'id')],
            'phone' => ['nullable', 'digits_between:5,15'],
        ];
    }
}
