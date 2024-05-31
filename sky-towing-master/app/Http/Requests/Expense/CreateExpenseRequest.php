<?php

namespace App\Http\Requests\Expense;

use Illuminate\Foundation\Http\FormRequest;

class CreateExpenseRequest extends FormRequest
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
            'service_id' => ['required', 'exists:services,id'],
            'towing_id' => ['required',  'exists:towings,id'],
        ];
    }


    protected function prepareForValidation()
    {
        $this->merge([
            'service_id' => $this->input('service_id', service()->id)
        ]);
    }
}
