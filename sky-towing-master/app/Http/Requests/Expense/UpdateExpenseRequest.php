<?php

namespace App\Http\Requests\Expense;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExpenseRequest extends FormRequest
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
            'date' => ['required', 'date'],
            'detail' => ['required', 'string'],
            'unit' => ['required', 'numeric', 'min:1'],
            'unit_price' => ['required', 'numeric', 'min:1'],
            'description' => ['nullable', 'string'],
            'towing_id' => ['required', 'numeric', 'exists:towings,id'],
        ];
    }
}
