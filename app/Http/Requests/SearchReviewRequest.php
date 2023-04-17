<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchReviewRequest extends FormRequest
{
    public function rules()
    {
        return [
            'keyword' => 'required',

        ];
    }

    public function attributes()
    {
        return [
            'keyword' => 'required',
        ];
    }
}
