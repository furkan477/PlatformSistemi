<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "name"=> "required|min:6",
            "email"=> "required|email|min:6",
            "password"=> "required|confirmed|min:6",
            "phone" => "required",
            "country"=> "required",
            "city"=> "required",
            "school"=> "required",
        ];
    }

    public function messages(): array
    {
        return [
            "name.required"=> "Ad Soyad alanı zorunludur !",
            "name.min"=> "Ad Soyad minumum 6 karakterden oluşmalıdır.",
            "email.required"=> "Email alanı zorunludur.",
            "email.email"=> "Email alanını doğru giriniz.",
            "email.min"=> "Email minumum 6 karakterden oluşmalıdır.",
            "password.required"=> "Şifre alanı zorunludur.",
            "password.confirmed"=> "Şifre uyuşmazlığı.",
            "password.min"=> "Şifre minumum 6 karakterden oluşmalıdır",
            "phone.required"=> "Telefon Alanı Zorunludur",
            "country.required"=> "Ülke Alanı Zorunludur",
            "city.required"=> "Şehir Alanı Zorunludur",
            "school.required"=> "Okul Alanı Zorunludur",
        ];
    }
}