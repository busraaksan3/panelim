<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            //
            'name' => 'required',
            'email' => 'required|email',
            'profile_photo_path' => 'image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages()
    {
        return [
            //
            'name.required' => 'Ad soyad alanını boş bırakamazsınız !',
            'email.required' => 'E-Posta alanını boş bırakamazsınız !',
            'email.email' => 'Lütfen geçerli bir e-posta adresi giriniz !',

            
            'profile_photo_path.image' => 'Seçtiğiniz dosya bir resim dosyası olmak zorundadır !',
            'profile_photo_path.mimes' => 'Sadece JPG,JPEG,PNG seçebilirsiniz.',
            'profile_photo_path.max' => 'Resim dosyası max 2MB olmalıdır.',
        ];
    }
}
