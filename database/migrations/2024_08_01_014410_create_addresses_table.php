<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->foreignUlid('person_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->string('type')->index();
            $table->string('zip_code')->index();
            $table->string('street')->index();
            $table->string('number')->index();
            $table->string('additional')->nullable();
            $table->string('neighborhood')->index();
            $table->string('state')->index();
            $table->string('city')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
