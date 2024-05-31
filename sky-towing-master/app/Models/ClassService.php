<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ClassService
 *
 * @property int $id
 * @property string $class_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ClassService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClassService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClassService query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClassService whereClassName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassService whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ClassService extends Model
{
    use HasFactory;
}
