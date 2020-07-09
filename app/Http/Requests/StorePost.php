<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //changed to true because, to awoid 403 errors after empty form submiting
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [  //return all validation that should by applay    

        //'title' - field name we send through the form, and string that validation rules should be used for a title   
        // first rule is required, second max:100, third min 5
        // if we want checking after firs rule fail we use bail constrait 'title' => 'bail|min:5|required|max:100',
        'title' => 'required|max:100|min:5',   //max 100 character min 5 chare
        'content' => 'required|min:10'
        ];
    }
}
