<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Airways;

class UpdateAirwaysRequest extends FormRequest
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
        $rules = Airways::$rules_update;
        $rules['name_en'] = $rules['name_en'].",".$this->route("airway");$rules['name_hu'] = $rules['name_hu'].",".$this->route("airway");$rules['name_sk'] = $rules['name_sk'].",".$this->route("airway");$rules['name_de'] = $rules['name_de'].",".$this->route("airway");
        return $rules;
    }
}
