<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiagnosisRequest extends FormRequest
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
            'diagnosis' => 'required|string',
            'medicine' => 'required|string',
            'review_date' => 'required_if:needs_review,1|date',
        ];
    }

    public function messages()
    {
        return [
            'diagnosis.required' => trans('validation.required'),
            'diagnosis.string' => trans('validation.string'),
            'medicine.required' => trans('validation.required'),
            'medicine.string' => trans('validation.string'),
            'review_date.required_if' => trans('validation.required_if'),
            'review_date.date' => trans('validation.date'),
        ];
    }
}