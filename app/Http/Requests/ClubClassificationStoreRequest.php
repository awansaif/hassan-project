<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClubClassificationStoreRequest extends FormRequest
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
            'club' => ['required', 'exists:clubs,id'],
            'name'    => ['required'],
            'citta'   => ['required'],
            'regione' => ['required'],
            'serie_a' => ['required'],
            'serie_b' => ['required'],
            'serie_c' => ['required'],
            'volo'    => ['required'],
            'trad'    => ['required'],
            'ball'    => ['required'],
            'italia'  => ['required'],
            'champian_cup' => ['required'],
            'trofee'      => ['required']
        ];
    }
}
