<?php

namespace Modules\ACL\Http\Requests\admin\Role;

use Illuminate\Foundation\Http\FormRequest;

class RoleEditRequest extends FormRequest
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
                'name'=>'required|unique:roles,name,'.$this->slug.',slug',
                'display_name'=>'required|max:255|string',
                'description'=>'required|max:255|string',
            ];
    }
}
