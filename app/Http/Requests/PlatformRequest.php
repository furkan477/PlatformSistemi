<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlatformRequest extends FormRequest
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
            "category_id" => "required",
            "subject"=> "required|min:6",
            "description" => "required|min:12",
        ];
    }

    public function messages(): array{
        return [
            "category_id.required"=> "Kategori Alanı Zorunludur.",
            "subject.required"=> "Konu Alanı Zorunludur.",
            "subject.min"=> "Konu Alanı  minumum 6 karakterden oluşmaktadır",
            "description"=> "Açıklama Alanı Zorunludur.",
            "description.min" => "Açıklama Alanı minumum 12 karakterden oluşmaktadır.",
        ];
    }
}
