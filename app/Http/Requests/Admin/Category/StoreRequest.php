<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:categories,name',
            'image' => 'required|mimes:jpg,png'
        ];
    }

    public function messages (): array
    {
        return[
            'name.required' => "Vui lòng nhập tên",
            'name.unique' => "Tên đã tồn tại",
            'image.required' => "Vui lòng chọn hình",
            'image.mines' => "Hình chỉ được là hình jpg hoặc png",
            
        ];
    }
}
