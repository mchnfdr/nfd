<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Itsmattch\Nfd\Models\Company;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'address' => fake()->address,
            'city' => fake()->city,
            'postal_code' => fake()->numerify('#####'),
            'tax_identifier' => fake()->unique()->numerify('##########'),
        ];
    }
}
