<?php

namespace App\Http\Requests;

use App\Constants\BattleMode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;

class BattlePostRequest extends FormRequest
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
            'map_id'       => ['required', 'exists:maps,id'],
            'name'         => ['required', 'string'],
            'mode'         => ['required', Rule::in(BattleMode::getValues())],
            'meeting_at'   => ['required', 'date'],
            'match_at'     => ['required', 'date'],
            'max_people'   => ['required', 'integer', 'min:0'],
            'use_template' => ['nullable', 'boolean'],
        ];
    }


    public function failedValidation(Validator $validator)
    {
        dd($validator->failed());
    }
}
