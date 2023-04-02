<?php

namespace App\Http\Requests\Admin\FeaturedService;

use App\Casts\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFeaturedServiceRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'icon' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'status' => ['required', Rule::enum(Status::class)],
        ];
    }
}