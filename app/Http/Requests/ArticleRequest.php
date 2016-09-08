<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request
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
        $id = ! is_null($this->news) ? $this->news->id : null;
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'title'          => 'required|min:3|max:255',
                    'slug'           => 'max:255|unique:articles,slug',
                    'author'         => 'required',
                    'body'           => 'required',
                    'published_date' => 'required|date',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'title'          => 'required|min:3|max:255',
                    'slug'           => 'max:255|unique:articles,slug,' . $id,
                    'author'         => 'required',
                    'body'           => 'required',
                    'published_date' => 'required|date',
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
        $data['slug'] = $data['slug'] ? $data['slug'] : str_slug($data['title']);
        $data['body'] = e($data['body']);

        return $data;
    }
}
