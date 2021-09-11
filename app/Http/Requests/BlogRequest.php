<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
            'thumbnail' => 'required|file|image|max: 10240|',
        ];
    }

    public function messages(){
        return[
            'title.required' => 'Vui lòng điền tiêu đề',
            'content.required' => 'Vui lòng điền nội dung',
            'thumbnail.required' => 'Vui lòng chọn ảnh',
            'thumbnail.image' => 'Bạn phải chọn file hình'
        ];
    }
}
