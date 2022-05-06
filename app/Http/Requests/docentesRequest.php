<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class docentesRequest extends FormRequest
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
            'nombre'=>'required|max:10',
            'tituloUniversitario|max:10',
            'edad'=>'required|max:2',
            'title' => 'size:10',
            'imagen'=>'required|image'
        ];



    }
}
