<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRole extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $role=$this->route()->parameter('role');

        $rules=[
            'name'=>'required|unique:roles',
            'permissions'=>'required'
        ];

        if($role){
            $rules=[
                'name'=>'required',
                'permissions'=>'required'
            ];
        }
        return $rules;
    }
}
