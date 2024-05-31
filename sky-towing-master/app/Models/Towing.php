<?php

namespace App\Models;

use App\Traits\CurrentServiceTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Towing
 *
 * @property string $id
 * @property int $service_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Expense> $expenses
 * @property-read int|null $expenses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Profit> $profits
 * @property-read int|null $profits_count
 * @method static \Illuminate\Database\Eloquent\Builder|Towing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Towing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Towing query()
 * @method static \Illuminate\Database\Eloquent\Builder|Towing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Towing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Towing whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Towing whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Towing extends Model
{
    use HasFactory, CurrentServiceTrait;

    public $incrementing = false;

    protected $fillable = ['service_id'];

    public function expenses(): HasMany
    {
        return $this->hasMany(Expense::class);
    }

    public function profits(): HasMany
    {
        return $this->hasMany(Profit::class);
    }
}
