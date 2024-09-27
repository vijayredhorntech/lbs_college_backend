<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'first_name' => 'required',
            'last_name' => 'required',
            'mother_name' => 'required',
            'guardian_father_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'uni_roll_number' => 'string',
            'uni_registration_no' => 'string',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'alt_phone' => 'string',
            'father_phone' => 'required',
            'club_name' => 'string',
            'domicile' => 'required',
            'aadhar_number' => 'required',
            'pan_number' => 'required',
            'nationality' => 'required',
            'religion' => 'required',
            'father_occupation' => 'required',
            'yearly_income' => 'required',
            'permanent_address' => 'required',
            'temp_address' => 'required',
            'is_expelled_before' => 'required',
            'expulsion_reason' => 'string',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
