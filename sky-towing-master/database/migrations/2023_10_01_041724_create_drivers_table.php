<?php

use App\Enums\DriverRole;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->enum('role', DriverRole::getValues())->index();
            $table->string('sim_type');
            $table->string('sim_path');
            $table->dateTime('expired_at')->nullable();
            $table->foreignIdFor(\App\Models\Service::class)->constrained()->cascadeOnDelete();
            $table->text('note')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
