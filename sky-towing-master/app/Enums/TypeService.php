<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class TypeService extends Enum
{
    const REGULER = 'reguler';
    const VIP = 'vip';
    const VVIP = 'vvip';

    public static function getBenefits(string $typeService): array
    {
        if ($typeService == TypeService::REGULER) {
            return [];
        }
        if ($typeService == TypeService::VIP) {
            // chose one
            return [
                'free_toll',
                'custom_date',
                'insurance',
            ];
        }

        return [
            'free_toll',
            'custom_date',
            'insurance',
        ];
    }
}
