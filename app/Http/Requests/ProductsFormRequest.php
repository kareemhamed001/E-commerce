<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsFormRequest extends FormRequest
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
        return [

            'category'=>[
                'required','integer'
            ],'name'=>[
                'required','string'
            ],'slug'=>[
                'required','string'
            ],'brand'=>[
                'required','integer'
            ],'image[]'=>[
                'nullable',
                'image' ,
            ],'small_description'=>[
                'required','string','max:500'
            ],'description'=>[
                'required','string'
            ],'original_price'=>[
                'required','integer'
            ],'selling_price'=>[
                'required','integer'
            ],'quantity'=>[
                'required','integer'
            ],'trending'=>[
                'nullable'
            ],'status'=>[
                'nullable'
            ],'meta_title'=>[
                'required','string'
            ],'meta_keyword'=>[
                'required','string'
            ],'meta_description'=>[
                'required','string'
            ],
        ];
    }
}
