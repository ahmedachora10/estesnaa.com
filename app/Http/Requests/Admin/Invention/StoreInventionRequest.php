<?php

namespace App\Http\Requests\Admin\Invention;

use App\Casts\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreInventionRequest extends FormRequest
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
            'category_id' => 'required|integer|exists:categories,id',
            'name' => 'required|string',
            'image' => 'required|image',
            'description' => 'required|string',
            'price' => 'required|integer',
            'discount' => 'nullable|integer',
            'keywords' => 'nullable|string',
            'status' => ['required', Rule::enum(Status::class)]
        ];
    }
}