<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'title' => 'required|max:50',
            'description' => 'required',
            'date_of_creation' => 'required',
            'cover_image' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.max' => 'Il titolo deve avere una lunghezza massima di :max caratteri',

            'description.required' => 'La descrizione è obbligatoria',

            'date_of_creation.required' => 'La data di creazione è obbligatoria',

            'cover_image.image' => 'Il file inserito deve essere un\'immagine!',
        ];
    }
}
