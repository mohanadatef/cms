<?php

namespace Modules\CoreData\Http\Requests\admin\Service;

use Illuminate\Foundation\Http\FormRequest;

class ServiceCreateRequest extends FormRequest
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
        ];
    }
}
