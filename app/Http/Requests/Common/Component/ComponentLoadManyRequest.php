<?php

namespace App\Http\Requests\Common\Component;

use Illuminate\Foundation\Http\FormRequest;

class ComponentLoadManyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "component" => "required|string",
            "records" => "required|array",
            "recordType" => "required|string",
        ];
    }
}
