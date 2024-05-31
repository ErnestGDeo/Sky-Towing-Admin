<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Attributes\Description;
use BenSampo\Enum\Enum;

final class DriverRole extends Enum
{

    #[Description('Driver')]
    const DRIVER = 'driver';
    #[Description('Co Driver')]
    const CO_DRIVER = 'co-driver';
}
