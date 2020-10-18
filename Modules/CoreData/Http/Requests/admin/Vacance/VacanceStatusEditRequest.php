<?php

namespace Modules\CoreData\Http\Requests\admin\Vacance;

use Illuminate\Foundation\Http\FormRequest;

class VacanceStatusEditRequest extends FormRequest
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
                'change_status'=>'required|exists:vacances,slug',
            ];

    }
}
