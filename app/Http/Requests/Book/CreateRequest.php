<?php

namespace App\Http\Requests\Book;

use App\Http\Requests\Request;

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
            'ISBN'      => 'required',
            'name'      => 'required',
            'author'    => 'required',
            'publisher' => 'required',
            'supplier'  => 'required',
            'category'  => 'required',
            'realese'   => 'required',
            'stock'     => 'required',
            'cover'     => 'required',
        ];
    }
}
