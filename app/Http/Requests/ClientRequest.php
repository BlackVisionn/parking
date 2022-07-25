<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'fio' => 'min:3',
            'gender' => 'required',
            'phone' => [
                'required',
                'numeric'
            ],
            'address' => 'required'
        ];

        if (!empty($this->client)){
            $rules['phone'][] = Rule::unique('clients')->ignore($this->client->id);
        }
        else{
            $rules['phone'][] = Rule::unique('clients');
        }

        return $rules;

    }
}
