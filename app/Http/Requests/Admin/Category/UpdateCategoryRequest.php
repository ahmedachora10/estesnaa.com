<?php

namespace App\Http\Requests\Admin\Category;

use App\Utils\CategoryType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
            'parent_id' => ['required', Rule::enum(CategoryType::class)],
            'name' => 'required|string',
            'description' => 'nullable|string',
        ];
    }
}