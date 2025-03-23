<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();

            /*
             * REVIEW: The following fields are intended to remain in a single
             * language. If multi-language support is needed, we might consider
             * using spatie/laravel-translatable with JSON columns.
             */
            $table->string('name');
            $table->string('address');
            $table->string('city');

            /*
             * REVIEW: The tax_identifier and postal_code fields are designed
             * specifically for Polish data. If multi-country support is required,
             * we would need to adjust these fields to accommodate international formats.
             */
            $table->char('postal_code', 5);

            /*
             * REVIEW: We generally enforce the uniqueness of tax_identifier (NIP)
             * for active companies. However, since inactive companies may have
             * previously claimed identifiers that could be recycled, the uniqueness
             * constraint might need to be adjusted based on legislative and business needs.
             */
            $table->char('tax_identifier', 10)->unique();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
