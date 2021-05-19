<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
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
            'event_image'     => ['required', 'image'],
            'secondary_image' => ['required', 'image'],
            'event_short_description' => ['required'],
            'event_long_description'  => ['required'],
            'event_price'             => ['required'],
            'event_place'             => ['required'],
            'event_timing'            => ['required'],
            'aurthor_name'            => ['required'],
            'federation_name'         => ['required'],
            'author_image'            => ['required', 'image'],
            'further_detail'          => ['required'],
            'location_map_link'       => ['required', 'url'],
            'zip_code'                => ['required'],
        ];
    }
}
