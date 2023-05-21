<?php

namespace App\Http\Requests\Admin\Service;

use App\Casts\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreServiceRequest extends FormRequest
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
            'price' => 'required|integer',
            'description' => 'required|string',
            'keywords' => 'nullable|string',
            'status' => ['sometimes', Rule::enum(Status::class)]
        ];
    }
}