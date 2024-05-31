<?php

namespace App\Services;

use App\Models\Driver;
use App\Models\Expense;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use function Laravel\Prompts\search;

/**@author Agung Prasetyo Nugroho <agungpn33@gmail.com> */
class DriverService
{

    public function getList(): LengthAwarePaginator
    {
        $collection = Driver::getByCurrentService();

        if (!empty(request('search'))) {
            $collection->contains([
                'name',
                'phone',
                'address',
                'role',
                'sim_type',
                'sim_path',
                'expired_at',
                'note',
            ], request('search'));

        }


        return $collection->latest()->paginate(10);
    }
}
