<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;
use PhpParser\Node\Expr\FuncCall;

class StoreRequest extends FormRequest
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
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => [
                "bail",
                "required",
                "string",
                "unique:App\Models\Course,name"
            ],
        ];
    }
    public function messages()
    {
        return [
            "required" => ":attribute bắt buộc phải điền!",
            "unique" => ":attribute Đã trùng",
        ];
    }
    public function attributes()
    {
        return [
            "name" => "Name",
        ];
    }
}
