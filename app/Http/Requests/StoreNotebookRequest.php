<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNotebookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'fio' => ['required', 'string'],
            'company' => ['string'],
            'phone_number' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:notebooks'],
            'birth_date' => ['date', 'date_format:d.m.Y'],
            'image' => ['required', 'string'],
        ];
    }
}
