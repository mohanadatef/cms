<?php

namespace Modules\ACL\Http\Requests\admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'username' => 'required|max:255|string|unique:users,username,'.$this->slug.',slug',
            'role_id' => 'required|exists:roles,id',
            'email' => 'required|email|max:255|string|unique:users,email,'.$this->slug.',slug',
        ];

    }

}
