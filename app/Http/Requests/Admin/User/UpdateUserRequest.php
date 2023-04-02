<?php

namespace App\Http\Requests\Admin\User;

use App\Casts\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->route('user'))],
            'password' => ['nullable', 'confirmed', Password::defaults()],
            'roles' => ['required', 'integer', 'exists:roles,id'],
            'avatar' => ['nullable', 'image'],
            'phone' => ['required', 'string', Rule::unique('users', 'phone')->ignore($this->route('user'))],
            'status' => ['required', Rule::enum(Status::class)],
        ];
    }
}