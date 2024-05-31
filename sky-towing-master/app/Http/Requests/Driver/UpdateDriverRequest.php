<?php

namespace App\Http\Requests\Driver;

use App\Enums\DriverRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDriverRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string'],
            'role' => ['required', Rule::in(DriverRole::getValues())],
            'sim_type' => ['required', 'string'],
            'sim_path' => ['nullable', 'image'],
            'expired_at' => ['required', 'date'],
            'note' => ['nullable', 'string'],
        ];
    }
}
