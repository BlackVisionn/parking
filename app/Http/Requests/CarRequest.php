<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CarRequest extends FormRequest
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
        $rules =[
            'mark' => 'required',
            'model' => 'required',
            'color' => 'required',
            'car_num' => [
                'required'
            ],
            'id_client' => 'required'
        ];

        if (!empty($this->car)) {
            $rules['car_num'][] = Rule::unique('cars')->ignore($this->car->id);
        } else {
            $rules['car_num'][] = Rule::unique('cars');
        }

        return $rules;
    }
}
