<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->string('detail');
            $table->integer('unit')->default(1);
            $table->integer('unit_price');
            $table->text('description')->nullable();

            $table->foreignIdFor(\App\Models\Towing::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Service::class)->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expences');
    }
};
