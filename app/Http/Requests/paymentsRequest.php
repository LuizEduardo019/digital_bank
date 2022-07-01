<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'to_account_id' => 'exist: account',
            'value' => 'required|min:0,01',
            'of_account_id' => 'exist:account|required'
        ];
    }

    public function feedback()
    {

        return [
            'required' => 'O campo :attribute é obrigatório',
            'receiver_account.exist:account' => 'A conta de destino precisa estar ativa para realizar o pagamento'
        ];
    }
}
