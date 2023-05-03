<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//changer true pour permettre le requete du passer
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() // 
    {
        return [
            //definir les rules du modele article
            'titlee'=>'required|min:5|max:100',
            'subtitlee'=>'required|min:5|max:100',
            'contentt'=>'required'

        ];
    }
}
