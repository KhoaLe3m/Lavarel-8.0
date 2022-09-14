<?php

namespace App\Http\Requests\Course;

use App\Models\Course;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            "name" => [
                "bail",
                "required",
                "string",
                Rule::unique(Course::class,"name")->ignore($this->course->id),
            ],
        ];
    }
    public function messages()
    {
        return [
            "required" => ":attribute bắt buộc phải điền!",
            "unique" => ":attribute Đã trùng với tên khác trong db",
        ];
    }
    public function attributes()
    {
        return [
            "name" => "Name",
        ];
    }
}
