<?php

namespace App\Services;

use App\Models\Expense;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**@author Agung Prasetyo Nugroho <agungpn33@gmail.com> */
class ExpenseService
{

    public function getList(): LengthAwarePaginator
    {
        $expenses = Expense::getByCurrentService();

        if (!empty(request('search'))) {
            $expenses->contains([
                'date',
                'detail',
                'unit',
                'unit_price',
                'description',
                'service.name',
                'towing.id',
            ], request('search'));
        }

        return $expenses->latest()->paginate(10);
    }
}
