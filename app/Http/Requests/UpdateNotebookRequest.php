<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNotebookRequest extends FormRequest
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
        return [
            'fio' => ['string'],
            'company' => ['string'],
            'phone_number' => ['string'],
            'email' => ['email'],
            'birth_date' => ['date', 'date_format:d.m.Y'],
            'image' => ['string'],
        ];
    }
}
