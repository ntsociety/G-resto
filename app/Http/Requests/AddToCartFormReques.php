<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;

class AddToCartFormReques extends FormRequest
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
            'quantity' => ['required', 'min:1', 'integer'],
            'date_reserv' => ['required', 'date', new DateBetween, new TimeBetween],
       ];
       return $rules;

    }
}
