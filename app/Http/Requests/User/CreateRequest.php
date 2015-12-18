<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;
use App\User_Detail;

class CreateRequest extends Request
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
            'user.username'     => 'required|unique:users,username',
            'detail.name'        => 'required',
            'user.email'        => 'required|unique:users,email',
            'user.password'     => 'required',
//            'detail.note'       => 'required',
        ];
    }
}
