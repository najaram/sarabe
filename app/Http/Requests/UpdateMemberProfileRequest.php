<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberProfileRequest extends FormRequest
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
            'member_id' => 'required|exists:members,id',
            'church_id' => 'required|string',
            'locale'    => 'required|string',
            'district'  => 'required|string',
            'division'  => 'required|string',
            'group'     => 'nullable|string'
        ];
    }
}
