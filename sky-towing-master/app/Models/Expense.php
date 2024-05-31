<?php

namespace App\Models;

use App\Traits\CurrentServiceTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Expence
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $date
 * @property string $detail
 * @property int $unit
 * @property int $unit_price
 * @property string|null $description
 * @property string $towing_id
 * @property int $service_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Service $service
 * @property-read \App\Models\Towing $towing
 * @method static \Database\Factories\ExpenseFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Expense newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Expense newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Expense query()
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereTowingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Expense extends Model
{
    use HasFactory;
    use CurrentServiceTrait;

    protected $fillable = [
        'date',
        'detail',
        'unit',
        'unit_price',
        'description',
        'service_id',
        'towing_id',
    ];

    protected $casts = [
        'date' => 'datetime'
    ];

    public function towing(): BelongsTo
    {
        return $this->belongsTo(Towing::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
