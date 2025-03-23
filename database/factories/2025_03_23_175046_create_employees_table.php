<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('last_name');

            /* REVIEW: We consider that employees do not share email addresses. */
            $table->string('email')->unique();

            /*
             * REVIEW: This is for Poland, considering a standard phone number
             * without the country prefix or internal shortened numbers
             */
            $table->char('phone', 9)->nullable();

            $table->foreignId('company_id')->constrained('companies')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
