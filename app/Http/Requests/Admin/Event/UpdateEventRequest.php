<?php

namespace App\Http\Requests\Admin\Event;

use App\Casts\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEventRequest extends FormRequest
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
            'image' => 'nullable|image',
            'title' => 'required|string',
            'description' => 'required|string',
            'address' => 'required|string',
            'date' => 'required',
            'time' => 'required',
            'keywords' => 'nullable|string',
            'status' => ['required', Rule::enum(Status::class)],
        ];
    }
}