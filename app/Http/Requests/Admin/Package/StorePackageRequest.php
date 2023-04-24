<?php

namespace App\Http\Requests\Admin\Package;

use App\Casts\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePackageRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer|min:0',
            'discount' => 'required|integer|min:0|max:100',
            'duration' => 'required|integer|min:0',
            'features' => 'required|array',
            'group' => ['required'],
            'status' => ['required', Rule::enum(Status::class)],
        ];
    }
}