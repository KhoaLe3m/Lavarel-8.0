<?php

namespace App\Http\Requests\Course;

use Illuminate\Validation\Rule;
use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
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
            "course" => [
                "required",
                Rule::exists(Course::class,"id"),
            ]
        ];
    }
    
    protected function prepareForValidation()
    {
        $this->merge(["course" => $this->route("course")]);
    }
    public function messages()
    {
        return [
            "required" => "bắt buộc phải nhập",
        ];
    }
}
