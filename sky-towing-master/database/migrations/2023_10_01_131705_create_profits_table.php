<?php

use App\Models\City;
use App\Models\Driver;
use App\Models\Service;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profits', function (Blueprint $table) {
            $table->id();
            $table->char('towing_id', 8);
            $table->foreign('towing_id')->on('towings')->references('id')->cascadeOnDelete();

            $table->unsignedBigInteger('driver_id')->nullable();
            $table->unsignedBigInteger('co_driver_id')->nullable();

            $table->foreign('driver_id')->on('drivers')->references('id')->nullOnDelete();
            $table->foreign('co_driver_id')->on('drivers')->references('id')->nullOnDelete();

            $table->string('vehicle_type');
            $table->string('vehicle_description');

            $table->unsignedBigInteger('from_city_id')->nullable();
            $table->unsignedBigInteger('destination_city_id')->nullable();
            $table->foreign('from_city_id')->on('cities')->references('id')->nullOnDelete();
            $table->foreign('destination_city_id')->on('cities')->references('id')->nullOnDelete();

            $table->timestamp('pickup_date')->nullable();
            $table->timestamp('dropoff_date')->nullable();

            $table->integer('shipping_cost')->default(0);
            $table->integer('total_cost')->default(0);
            $table->integer('total_of_wage')->default(0);
            $table->integer('operational_cost')->default(0);

            $table->string('payment_method');

            $table->text('description')->nullable();
            $table->string('office')->nullable(); // TODO: remove

            $table->foreignIdFor(Service::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\ClassService::class)->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profits');
    }
};
