<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBlogRequest extends FormRequest
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
        'blog_title' => 'required',
        'blog_content' => 'required',        
        'blog_file' => 'image|mimes:jpg,jpeg,png|max:2048',
        ];
    }
    public function messages()
    {
        return [
            //
            'blog_title.required' => 'Blog başlığı alanını boş bırakamazsınız !',
            'blog_content.required' => 'Blog içerik alanını boş bırakamazsınız !',
                        
            'blog_file.image' => 'Seçtiğiniz dosya bir resim dosyası olmak zorundadır !',
            'blog_file.mimes' => 'Sadece JPG,JPEG,PNG seçebilirsiniz.',
            'blog_file.max' => 'Resim dosyası max 2MB olmalıdır.',
        ];
    }
}
