<?php

namespace Modules\CoreData\Http\Requests\admin\Category_Service;

use Illuminate\Foundation\Http\FormRequest;

class Category_ServiceEditRequest extends FormRequest
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
                'service_id' => 'required|exists:services,id',
                'description_ar'=>'required|string|max:500',
                'description_en'=>'required|string|max:500',
                'title_ar'=>'required|string|max:255',
                'title_en'=>'required|string|max:255',
                'order'=>'required|min:1',
                'image'=> 'image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            ];

    }
}
