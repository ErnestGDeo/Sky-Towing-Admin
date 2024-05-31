<?php

namespace Tests\Feature;

use App\Models\Profit;
use Arr;
use Carbon\Carbon;
use Tests\TestCase;

class ProfitTest extends TestCase
{

    public function test_success_create_profit()
    {
        $user = $this->actingAsAdmin();
        // create payload request
        $payload = Profit::factory()->make()->toArray();

        // try to request
        $response = $this->post('/profits', $payload);

        // ensure redirect (302)
        $response->assertRedirect();
        // ensure data stored
        self::assertTrue(
            Profit::where($payload)->exists()
        );
    }

    public function test_failed_create_profit()
    {
        $user = $this->actingAsAdmin();

        // create payload request
        $payload = Profit::factory()->make()->toArray();
        // set drop before pick up date
        $payload['dropoff_date'] = Carbon::parse($payload['pickup_date'])
            ->subDay()->format('Y-m-d');

        // try to request
        $response = $this->post('/profits', $payload);

        // ensure dropoff_date cannot before pickup_date
        $response->assertInvalid(['dropoff_date']);

        // ensure data stored
        self::assertTrue(
            Profit::where($payload)->doesntExist()
        );
    }

    public function test_success_update_profit()
    {
        $user = $this->actingAsAdmin();

        $profit = Profit::factory()->create();
        $payload = Profit::factory()->make()->toArray();

        // try to request
        $response = $this->put('/profits/' . $profit->id, $payload);

        $response->assertRedirect();

        self::assertTrue(
            Profit::where(Arr::except($payload, 'service_id'))->exists()
        );
    }

    public function test_failed_update_profit()
    {
        $user = $this->actingAsAdmin();

        $profit = Profit::factory()->create();
        $payload = Profit::factory()->make()->toArray();


        $payload['dropoff_date'] = Carbon::parse($payload['pickup_date'])
            ->subDay()->format('Y-m-d');

        // try to request
        $response = $this->put('/profits/' . $profit->id, $payload);

        // ensure dropoff_date cannot before pickup_date
        $response->assertInvalid(['dropoff_date']);

        self::assertTrue(
            Profit::where($payload)->doesntExist()
        );
    }

    public function test_delete_profit()
    {
        $user = $this->actingAsAdmin();

        $profit = Profit::factory()->create();

        $response = $this->delete('/profits/' . $profit->id);
        $response->assertRedirect();
        // ensure data deleted
        self::assertTrue(
            Profit::where('id', $profit->id)->doesntExist()
        );
    }
}
