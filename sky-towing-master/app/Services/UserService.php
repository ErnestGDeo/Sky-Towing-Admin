<?php

namespace App\Services;

use App\Http\Requests\UserRequest;
use App\Models\Driver;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserService
{

    public function getList(): LengthAwarePaginator
    {
        $collection = Driver::getByCurrentService();

        if (!empty(request('search'))) {
            $collection->contains([
                'name',
                'username',
                'role',
            ], request('search'));

        }


        return $collection->latest()->paginate(10);
    }

    public function save(array $input, ?User $user = null): User
    {
        $user = $user ?? new User();

        if (isset($input['password']))
            $input['password'] = bcrypt($input['password']);
        else
            unset($input['password']);

        $user->fill($input);

        $user->save();
        return $user;
    }
}
