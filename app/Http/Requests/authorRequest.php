<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class authorRequest extends FormRequest
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
            'names'=> 'required|string',
            'email'=>'required|email',
            'photo'=> 'required|mimes:png,jpg'
        ];
    }


    public function attributes(){
      return [
        'names'=> 'Full Name',
        'email'=> 'Email',
        'photo'=> 'Image'
      ];
    }
}
