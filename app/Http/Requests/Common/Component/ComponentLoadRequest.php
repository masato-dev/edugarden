<?php

namespace App\Http\Requests\Common\Component;

use Illuminate\Foundation\Http\FormRequest;

class ComponentLoadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
            "record" => "required|json",
            "recordType" => "required|string",
        ];
    }
}
