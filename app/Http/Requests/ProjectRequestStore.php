<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequestStore extends FormRequest
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
            'name' => 'bail|required|min:3',
            'description' => 'bail|required',
            'vision' => 'bail|required',
            'preface' => 'bail|required',
            'productowners' => 'bail|required',
            'scrummasters' => 'bail|required',
            'techleaders' => 'bail|required',
            'teammembers' => 'bail|required',
            'stackholders' => 'bail|required',
            'image' => 'bail|required',
        ];
    }
}
