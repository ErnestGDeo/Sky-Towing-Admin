<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PaymentMethode extends Enum
{
    const TRANSFER = 'transfer';
    const CASH = 'cash';
}
