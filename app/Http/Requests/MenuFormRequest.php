<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MenuFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'cate_id' => ['required'],
            'description' => ['required'],
            'price' => ['required', 'integer'],
       ];

       if($this->getMethod() == "POST")
       {
            $rules += [
                'name' => ['required', 'unique:menus,name'],
        ];
       }
       if($this->getMethod() == "PUT")
       {
            $rules += [
                'name' => ['required',
                Rule::unique('categories')->ignore($this->category)
            ],
        ];
       }

       if($this->getMethod() == "POST")
       {
            $rules += [
                'image' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
        ];
       }
       if($this->getMethod() == "PUT")
       {
            $rules += [
                'image' => ['image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
        ];
       }


       return $rules;
    }
    public function messages()
    {
        return [
            'cate_id.required' => 'Veuillez sélectioner la catégorie du Menu',
            'name.required' => 'Veuillez donner le nom du Menu',
            'name.unique' => 'Le nom de ce Menu existe déjà',
            'price.required' => 'Veuillez donner le Prix du Menu',
            'description.required' => 'Veuillez donner la description du Menu',
            'image.required' => 'Veuillez sélectioner l\'image du Menu',
            'image.image' => 'le format de votre fichier n\'est pas valide',
        ];
    }
}
