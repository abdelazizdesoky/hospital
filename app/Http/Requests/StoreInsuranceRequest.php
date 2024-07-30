<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInsuranceRequest extends FormRequest
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
            'insurance_code' => 'required',
            'discount_percentage' =>'required|numeric',
           // 'Company_rate' =>'required|numeric',
            'name' => 'required|unique:insurance_translations,name,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'insurance_code.required' => trans('insurance_code.validation.required'),
            'discount_percentage.required' => trans('discount_percentage.validation.required'),
            'discount_percentage.numeric' => trans('discount_percentage.validation.numeric'),
            'Company_rate.required' => trans('Company_rate.validation.required'),
            'Company_rate.numeric' => trans('Company_rate.validation.numeric'),
            'name.required' => trans('name.validation.required'),
            'name.unique' => trans('name.validation.unique'),
        ];
    }
}
