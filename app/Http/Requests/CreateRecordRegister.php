<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRecordRegister extends FormRequest
{
    const TYPE = 'type';
    const AMOUNT = 'amount';
    const WALLET_ID = 'id';
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            self::AMOUNT=> [
                'required',
                'int'
            ],
            self::WALLET_ID=> [
                'required',
                'int'
            ],
            self::TYPE=> [
                'required',
                'string'
            ],
        ];
    }

    public function getAmount()
    {
        return $this->get(self::AMOUNT);
    }

    public function getWalletId()
    {
        return $this->get(self::WALLET_ID);
    }

    public function getType()
    {
        return $this->get(self::TYPE);
    }
}
