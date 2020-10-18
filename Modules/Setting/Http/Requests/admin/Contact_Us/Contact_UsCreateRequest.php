<?php

namespace Modules\Setting\Http\Requests\admin\Contact_Us;

use Illuminate\Foundation\Http\FormRequest;

class Contact_UsCreateRequest extends FormRequest
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
            'address_ar'=>'required|string|max:255',
            'time_work_ar'=>'required|string|max:255',
            'latitude'=>'required',
            'longitude'=>'required',
            'phone'=>'required|min:1',
            'address_en'=>'required|string|max:255',
            'time_work_en'=>'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ];
    }
}
