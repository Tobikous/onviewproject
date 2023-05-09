<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Rules\MaxReviewsPerOnsen;
use Illuminate\Contracts\Validation\Validator;
use App\Http\Controllers\HomeController;

class ReviewStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'onsenName' =>  ["required", "min:2", "max:20", new MaxReviewsPerOnsen($this->update)],
            'star' => "required",
            'time' => "required",
            'content' => "required|min:2|max:800",
            'tag' => "required",

        ];
    }

    public function attributes()
    {
        return [
            'content' => "レビュー詳細",
            'star' => "レビュー点数",
            'time' => "時間帯",
            'image' => "画像",
            'tag' => "タグ",
            'onsenName' => "温泉名",
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            redirect()->route('home')->withErrors($validator)->with('error', '同じ温泉の投稿は3件までしかできません。')
        );
    }

    protected $update;

    public function __construct(Request $request)
    {
        $this->update = $request->route('id') !== null;
    }



    protected $redirect = '/review/create';
}
