<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Rules\MaxReviewsPerOnsen;
use Illuminate\Contracts\Validation\Validator;
use App\Http\Controllers\HomeController;

class OnsenUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'area' => "required|min:1|max:10",
            'formatted_address' => "required",
            'nearest_station' => "required|max:20",
            'regular_holiday' => "required|max:30",
        ];
    }

    public function attributes()
    {
        return [
            'area' => "都道府県",
            'formatted_address' => "住所",
            'nearest_station' => "最寄り駅",
            'regular_holiday' => "定休日",
        ];
    }


    public function __construct(Request $request)
    {
        $this->update = $request->route('id') !== null;
    }



    protected $redirect = '/onsen_lists';
}
