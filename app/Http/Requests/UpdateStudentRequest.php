<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateStudentRequest extends FormRequest
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
        $method = $this->method();
        if($method== 'PUT'){
            return[
                'control_number' => ['required'],
                'student_name' => ['required'],
                'lastname' => ['required'],
                'email' => ['required','email'],
                'password' => ['required'],
                'gender' => ['required',Rule::in('Hombre','Mujer')],
                'birthdate' => ['required'],
                'telephone' =>[ 'required'],
                'street' => ['required'],
                'suburb' => ['required'],
                'status' => ['required'],
                'street' => ['required'],
                'semester' => ['required'],
                'role_id' => ['required'],
                'town_id' => ['required'],
                'career_id' => ['required'],
             
            ];
        }else{
            return[
                'control_number' => ['sometimes','required'],
                'student_name' => ['sometimes','required'],
                'lastname' => ['sometimes','required'],
                'email' => ['sometimes','required','email'],
                'password' => ['sometimes','required'],
                'gender' => ['sometimes','required',Rule::in('Hombre','Mujer')],
                'birthdate' => ['sometimes','required'],
                'telephone' =>[ 'sometimes','required'],
                'street' => ['sometimes','required'],
                'suburb' => ['sometimes','required'],
                'status' => ['sometimes','required'],
                'street' => ['sometimes','required'],
                'semester' => ['sometimes','required'],
                'role_id' => ['sometimes','required'],
                'town_id' => ['sometimes','required'],
                'career_id' => ['sometimes','required'],
                ];

        }
    }
}
