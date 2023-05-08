<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'keyword' => 'required|string|max:255',

        ];
    }

    public function attributes()
    {
        return [
            'keyword' => 'required',
        ];
    }
}
