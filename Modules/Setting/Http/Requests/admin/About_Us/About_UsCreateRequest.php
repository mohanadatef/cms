<?php

namespace Modules\Setting\Http\Requests\admin\About_us;

use Illuminate\Foundation\Http\FormRequest;

class About_UsCreateRequest extends FormRequest
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
            'description_ar'=>'required|string|max:500',
            'description_en'=>'required|string|max:500',
            'title_ar'=>'required|string|max:255',
            'title_en'=>'required|string|max:255',
            'image'=> 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ];
    }
}
