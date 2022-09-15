<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateWalletRequest extends FormRequest
{
    const NAME = 'name';
    const TYPE = 'type';

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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            self::NAME=> [
                'required',
                'string'
            ],
            self::TYPE=> [
                'required',
                'string'
            ],
        ];
    }

    public function getName()
    {
        return $this->get(self::NAME);
    }

    public function getType()
    {
        return $this->get(self::TYPE);
    }
}
