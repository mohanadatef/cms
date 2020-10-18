<?php

namespace Modules\MediaCenter\Http\Requests\admin\Gallery;

use Illuminate\Foundation\Http\FormRequest;

class GalleryCreateRequest extends FormRequest
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
                'title_ar'=>'required|string|max:255',
                'title_en'=>'required|string|max:255',
                'order'=>'required|min:1',
                'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            ];

    }
}
