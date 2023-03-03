<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'onsenName' => "required|min:2",
            'star' => "required",
            'time' => "required",
            'content' => "required|min:2",
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
}
