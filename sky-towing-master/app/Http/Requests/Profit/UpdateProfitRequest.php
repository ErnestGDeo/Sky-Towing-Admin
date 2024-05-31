<?php

namespace App\Http\Requests\Profit;

use App\Models\Profit;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfitRequest extends FormRequest
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
            'towing_id' => ['required', 'exists:towings,id'],
            'driver_id' => ['required', 'exists:drivers,id'],
            'co_driver_id' => ['required', 'exists:drivers,id'],
            'vehicle_type' => ['required', 'string'],
            'vehicle_description' => ['required', 'string'],
            'from_city_id' => ['required', 'exists:cities,id'],
            'destination_city_id' => ['required', 'exists:cities,id'],
            'pickup_date' => ['required', 'date'],
            'dropoff_date' => ['required', 'date', 'after:pickup_date'],
            'shipping_cost' => ['nullable', 'integer'],
            'total_cost' => ['nullable', 'integer'],
            'total_of_wage' => ['nullable', 'integer'],
            'operational_cost' => ['nullable', 'integer'],
            'payment_method' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'office' => ['nullable', 'string'],
            'class_service_id' => ['required', 'exists:class_services,id'],
        ];
    }
}
