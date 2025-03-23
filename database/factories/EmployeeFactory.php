<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Itsmattch\Nfd\Models\Company;
use Itsmattch\Nfd\Models\Employee;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'email' => fake()->unique()->email,
            'phone' => fake()->unique()->numerify('#########'),
            'company_id' => Company::factory(),
        ];
    }
}
