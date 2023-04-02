<?php

namespace App\Http\Requests\Admin\Location;

use App\Casts\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCityRequest extends FormRequest
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
            'country_id' => ['required', 'int', 'exists:countries,id'],
            'name' => ['required', 'string'],
            'status' => ['required', Rule::enum(Status::class)],
        ];
    }
}