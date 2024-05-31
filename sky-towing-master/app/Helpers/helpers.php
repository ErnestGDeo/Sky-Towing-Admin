<?php

use App\Models\Service;

if (!function_exists('service')) {
    function service(): ?Service
    {
        return session('service');
    }
}

if (!function_exists('idrPrice')) {
    function idrPrice(int|float $price): string
    {
        return 'Rp. ' . number_format($price, 0, ',', '.');
    }
}

if (!function_exists('arrayFormatMerge')) {
    function arrayFormatMerge(array $data, ?string $separator = ' - '): string
    {
        $data = array_filter($data);
        if (empty($data)) {
            return $separator;
        }
        return implode($separator, $data);
    }
}

if (!function_exists('int_to_month')) {
    function int_to_month(int $month): string
    {
        return match ($month) {
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
            default => 'Unknown',
        };
    }
}
