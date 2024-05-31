<?php

namespace App\Traits;

/**@author Agung Prasetyo Nugroho <agungpn33@gmail.com> */
trait AuthorizationTrait
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
