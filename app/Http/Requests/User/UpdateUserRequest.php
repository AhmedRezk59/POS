<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->hasPermission('update_users');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'min:3', 'max:25'],
            'last_name' => ['required', 'string', 'min:3', 'max:25'],
            'email' => ['required', 'email', 'unique:users,email,' . $this->user->id],
            'image' => ['sometimes', 'nullable', 'image', 'mimes:png,jpg,jpeg'],
            'password' => ['sometimes', 'nullable', 'string', 'min:8', 'confirmed'],
            'permissions' => 'array'
        ];
    }
}
