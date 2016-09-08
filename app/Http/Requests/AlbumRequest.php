<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AlbumRequest extends Request
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
            'level' => 'required|max:255',
            'name'        => 'required|max:255'
        ];
    }

    public function all()
    {
        $data = parent::all();
        $data['visibility'] = (boolean) $data['visibility'];
        $data['slug'] = str_slug($data['name']);

        return $data;
    }
}
