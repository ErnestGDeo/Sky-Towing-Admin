<?php

namespace App\Models;

use App\Traits\CurrentServiceTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Profit
 *
 * @property int $id
 * @property string $towing_id
 * @property int|null $driver_id
 * @property int|null $co_driver_id
 * @property string $vehicle_type
 * @property string $vehicle_description
 * @property int|null $from_city_id
 * @property int|null $destination_city_id
 * @property \Illuminate\Support\Carbon|null $pickup_date
 * @property \Illuminate\Support\Carbon|null $dropoff_date
 * @property int $shipping_cost
 * @property int $total_cost
 * @property int $total_of_wage
 * @property int $operational_cost
 * @property string $payment_method
 * @property string|null $description
 * @property string|null $office
 * @property int $service_id
 * @property int $class_service_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ClassService $classService
 * @property-read \App\Models\Driver|null $coDriver
 * @property-read \App\Models\Driver|null $driver
 * @property-read \App\Models\City|null $fromCity
 * @property-read \App\Models\City|null $toCity
 * @property-read \App\Models\Towing $towing
 * @method static \Database\Factories\ProfitFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Profit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereClassServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereCoDriverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereDestinationCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereDriverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereDropoffDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereFromCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereOffice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereOperationalCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit wherePickupDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereShippingCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereTotalCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereTotalOfWage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereTowingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereVehicleDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereVehicleType($value)
 * @mixin \Eloquent
 */
class Profit extends Model
{
    use HasFactory;
    use CurrentServiceTrait;

    protected $fillable = [
        'towing_id',
        'driver_id',
        'co_driver_id',
        'vehicle_type',
        'vehicle_description',
        'from_city_id',
        'destination_city_id',
        'pickup_date',
        'dropoff_date',
        'shipping_cost',
        'total_cost',
        'total_of_wage',
        'operational_cost',
        'payment_method',
        'description',
        'service_id',
        'class_service_id',
    ];

    protected $casts = [
        'pickup_date' => 'datetime',
        'dropoff_date' => 'datetime',
    ];

    /**
     * Sisa borongan
     *
     */
    public function remainingWages(): Attribute
    {
        return Attribute::get(fn() => $this->attributes['total_of_wage'] - $this->attributes['operational_cost']);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function coDriver(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'co_driver_id', 'id');
    }

    public function fromCity(): BelongsTo
    {
        return $this->belongsTo(City::class, 'from_city_id', 'id');
    }

    public function toCity(): BelongsTo
    {
        return $this->belongsTo(City::class, 'destination_city_id', 'id');
    }

    public function towing(): BelongsTo
    {
        return $this->belongsTo(Towing::class);
    }

    public function classService(): BelongsTo
    {
        return $this->belongsTo(ClassService::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
