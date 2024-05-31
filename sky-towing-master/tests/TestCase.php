<?php

namespace Tests;

use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;

    public function actingAsAdmin()
    {
        $user = User::first();
        $this->actingAs($user);
        $this->setService();
        return $user;
    }

    public function setService(?Service $service = null)
    {
        $service = $service ?? Service::inRandomOrder()->first();
        session()->put('service', $service);
    }
}
