<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait CurrentServiceTrait
{
    public static function getByCurrentService(): Builder
    {
        return self::where('service_id', service()?->id);
    }
}
