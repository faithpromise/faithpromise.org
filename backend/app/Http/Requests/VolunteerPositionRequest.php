<?php

namespace App\Http\Requests;

use \App\Http\Requests\Request as BaseRequest;

class VolunteerPositionRequest extends BaseRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'first_name'   => 'required',
            'email'        => 'required|email',
            'phone'        => 'required',
            'message_body' => 'required',
            'campus'       => 'required'
        ];
    }
}
