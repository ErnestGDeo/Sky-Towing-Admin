<?php

namespace Tests\Feature;

use App\Enums\DriverRole;
use App\Models\Driver;
use Arr;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class DriverTest extends TestCase
{

    public function test_success_create_driver()
    {
        $user = $this->actingAsAdmin();

        $response = $this->post('/drivers', $payload = [
            'name' => fake()->name,
            'phone' => fake()->phoneNumber,
            'address' => fake()->address,
            'role' => DriverRole::getRandomValue(),
            'sim_type' => fake()->word,
            'sim_path' => UploadedFile::fake()->image('avatar.jpg'),
            'expired_at' => fake()->date,
            'note' => fake()->text,
            'email' => fake()->email,
        ]);

        $response->assertRedirect();
        self::assertTrue(
            Driver::where(Arr::except($payload, ['sim_path']))->exists()
        );
    }

    public function test_failed_create_driver()
    {
        $user = $this->actingAsAdmin();

        // try not send email
        $response = $this->post('/drivers', $payload = [
            'name' => fake()->name,
            'phone' => fake()->phoneNumber,
            'address' => fake()->address,
            'role' => DriverRole::getRandomValue(),
            'sim_type' => fake()->word,
            'sim_path' => UploadedFile::fake()->image('avatar.jpg'),
            'expired_at' => fake()->date,
            'note' => fake()->text,
        ]);

        // ensure getting error about email
        $response->assertInvalid(['email']);

        // ensure data not stored
        self::assertTrue(
            Driver::where(Arr::except($payload, ['sim_path']))->doesntExist()
        );
    }

    public function test_success_update_driver()
    {
        $user = $this->actingAsAdmin();

        $driver = Driver::factory()->create();

        $response = $this->put('/drivers/' . $driver->id, $payload = [
            'name' => fake()->name,
            'phone' => fake()->phoneNumber,
            'address' => fake()->address,
            'role' => DriverRole::getRandomValue(),
            'sim_type' => fake()->word,
            'sim_path' => UploadedFile::fake()->image('avatar.jpg'),
            'expired_at' => fake()->date,
            'note' => fake()->text,
            'email' => fake()->email,
        ]);

        $response->assertRedirect();
        self::assertTrue(
            Driver::where(Arr::except($payload, ['sim_path']))->exists()
        );
    }

    public function test_failed_update_driver()
    {
        $user = $this->actingAsAdmin();

        $driver = Driver::factory()->create();

        $response = $this->put('/drivers/' . $driver->id, $payload = [
            'name' => fake()->name,
            'phone' => fake()->phoneNumber,
            'address' => fake()->address,
            'role' => DriverRole::getRandomValue(),
            'sim_type' => fake()->word,
            'sim_path' => UploadedFile::fake()->image('avatar.jpg'),
            'expired_at' => fake()->date,
            'note' => fake()->text,
        ]);

        $response->assertInvalid(['email']);
        self::assertTrue(
            Driver::where(Arr::except($payload, ['sim_path']))->doesntExist()
        );
    }

    public function test_delete_driver()
    {
        $user = $this->actingAsAdmin();

        $driver = Driver::factory()->create();

        $response = $this->delete('/drivers/' . $driver->id);
        $response->assertRedirect();
        // ensure data deleted
        self::assertTrue(
            Driver::where('id', $driver->id)->doesntExist()
        );
    }
}
