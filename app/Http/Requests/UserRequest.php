<?php

namespace App\Http\Requests;

class UserRequest extends Request
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
        $id = ! is_null($this->users) ? $this->users->id : null;
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'first_name' => 'required|max:255',
                    'last_name'  => 'required|max:255',
                    'email'      => 'required|email|max:255|unique:users',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'first_name' => 'sometimes|required|max:255',
                    'last_name'  => 'sometimes|required|max:255',
                    'email'      => 'required|email|max:255|unique:users,email,' . $id,
                ];
            }
            default:
                return [];
                break;
        }
    }

    public function all()
    {
        $data = parent::all();

        return $data;
    }

}
