<?php

declare(strict_types=1);

use Itsmattch\Nfd\Http\Controllers\Employee\UpdateEmployeeController;
use Itsmattch\Nfd\Models\Company;
use Itsmattch\Nfd\Models\Employee;
use Workbench\Database\Factories\UserFactory;

covers(UpdateEmployeeController::class);

test('it updates an employee for the given company', function () {

    $user = (new UserFactory)->create();

    /** @var Company $company */
    $company = Company::factory()->createOne();

    /** @var Employee $employee */
    $employee = Employee::factory()->create([
        'company_id' => $company->id,
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john@example.com',
        'phone' => '123456789',
    ]);

    $payload = [
        'first_name' => 'Jane',
        'last_name' => 'Doe',
        'email' => 'jane@example.com',
        'phone' => '987654321',
    ];

    $response = $this->actingAs($user)
        ->putJson(route('companies.employees.update', [
            'company' => $company->id,
            'employee' => $employee->id,
        ]), $payload);

    $response->assertStatus(200);
    $response->assertJsonFragment([
        'id' => $employee->id,
        'first_name' => 'Jane',
        'last_name' => 'Doe',
        'email' => 'jane@example.com',
        'phone' => '987654321',
        'company_id' => $company->id,
    ]);

    $this->assertDatabaseHas('employees', [
        'id' => $employee->id,
        'first_name' => 'Jane',
        'last_name' => 'Doe',
        'email' => 'jane@example.com',
        'phone' => '987654321',
        'company_id' => $company->id,
    ]);
});

test('it rejects invalid update payload for employee', function () {

    $user = (new UserFactory)->create();

    /** @var Company $company */
    $company = Company::factory()->createOne();

    /** @var Employee $employee */
    $employee = Employee::factory()->create([
        'company_id' => $company->id,
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john@example.com',
        'phone' => '123456789',
    ]);

    $payload = [
        'first_name' => 'Jane',
        'last_name' => 'Doe',
        'email' => 'jane@example.com',
        'phone' => '1234',
    ];

    $response = $this->actingAs($user)
        ->putJson(route('companies.employees.update', [
            'company' => $company->id,
            'employee' => $employee->id,
        ]), $payload);

    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['phone']);
});
