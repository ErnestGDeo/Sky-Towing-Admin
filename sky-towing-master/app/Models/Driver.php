<?php

namespace App\Models;

use App\Traits\CurrentServiceTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Driver
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $role
 * @property string $sim_type
 * @property string $sim_path
 * @property \Illuminate\Support\Carbon|null $expired_at
 * @property int $service_id
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\DriverFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Driver newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Driver newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Driver query()
 * @method static \Illuminate\Database\Eloquent\Builder|Driver whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Driver whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Driver whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Driver whereExpiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Driver whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Driver whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Driver whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Driver wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Driver whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Driver whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Driver whereSimPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Driver whereSimType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Driver whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Driver extends Model
{
    use HasFactory;
    use CurrentServiceTrait;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'role',
        'sim_type',
        'sim_path',
        'expired_at',
        'note',
        'service_id',
    ];

    protected $casts = [
        'expired_at' => 'datetime'
    ];

    public function simPathUrl(): Attribute
    {
        return Attribute::get(function () {
            if (empty($this->sim_path)) {
                return asset("assets/static/images/samples/1.png");
            }
            return asset('storage/' . $this->sim_path);
        });
    }
}
