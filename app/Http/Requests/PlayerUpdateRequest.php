<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerUpdateRequest extends FormRequest
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
            'country_name' => ['required'],
            'player_name'  => ['required'],
            'player_image' => ['nullable', 'image'],
            'player_role'  => ['required'],
            'club'    => ['required'],
            'club_image'   => ['nullable', 'image'],
            'player_favorite_shot' => ['required'],
            'player_favorite_table' => ['required'],
            'sponser_image_one'  => ['nullable', 'image'],
            'sponser_image_two'  => ['nullable', 'image'],
        ];
    }
}
