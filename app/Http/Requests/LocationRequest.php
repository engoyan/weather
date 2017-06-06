<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LocationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'zip' => [
                'required',
                'digits:5', // or regexp for zip
                Rule::unique('locations')->where(function ($query) {
                    $query->where('user_id', auth()->user()->id);
                })
            ]
        ];
    }
}
