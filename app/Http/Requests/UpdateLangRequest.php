<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLangRequest extends FormRequest
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
                'name' => 'required',                        
                'flag' => 'image|mimes:jpg,jpeg,png|max:2048',
                ];
            }
            public function messages()
            {
                return [
                    //
                    'name.required' => 'Dil Adı alanını boş bırakamazsınız !',                    
                             
                                
                    'flag.image' => 'Seçtiğiniz dosya bir resim dosyası olmak zorundadır !',
                    'flag.mimes' => 'Sadece JPG,JPEG,PNG seçebilirsiniz.',
                    'flag.max' => 'Resim dosyası max 2MB olmalıdır.',
                ];
            }
        }