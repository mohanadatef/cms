<?php

namespace Modules\MediaCenter\Http\Requests\admin\Album;

use Illuminate\Foundation\Http\FormRequest;

class AlbumStatusEditRequest extends FormRequest
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
                'change_status'=>'required|exists:albums,slug',
            ];

    }
}
