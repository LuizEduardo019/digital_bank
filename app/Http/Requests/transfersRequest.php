<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransfersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            'to_account' => 'exist:, account_number',
            'value' => 'required|min:0,01',
            'description' => 'nullabel',
            'of_account' => 'exist:account|required'
        ];
    }
}
