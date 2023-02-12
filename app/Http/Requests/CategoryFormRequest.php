<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
            'description' => ['required'],
       ];

       if($this->getMethod() == "POST")
       {
            $rules += [
                'name' => ['required', 'unique:categories,name'],
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
            'name.required' => 'Veuillez donner le nom de la catégorie',
            'name.unique' => 'Le nom de cette catégorie existe déjà',
            'description.required' => 'Veuillez donner la description de la catégorie',
            'image.required' => 'Veuillez sélectioner l\'image de la catégorie',
            'image.image' => 'le format de votre fichier n\'est pas valide',
        ];
    }
}
