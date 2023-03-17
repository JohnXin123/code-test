<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployee extends FormRequest
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'company_id' => 'required|exists:companies,id',
            'department' => 'nullable',
            'phone_no' => 'nullable',
            'address' => 'nullable',
            'email' => 'required_if:is_email_enabled,true|unique:users,email|email',
            'password' => 'required_if:is_password_enabled,true',
            'staff_id' => 'nullable'
        ];
    }
}
