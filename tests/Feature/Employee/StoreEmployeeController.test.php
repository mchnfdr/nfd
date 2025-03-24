<?php

declare(strict_types=1);

use Itsmattch\Nfd\Http\Controllers\Employee\StoreEmployeeController;
use Itsmattch\Nfd\Models\Company;
use Workbench\Database\Factories\UserFactory;

covers(StoreEmployeeController::class);

test('it stores a new employee for the given company', function () {
    /** @var Company $company */
    $company = Company::factory()->createOne();
    $user = (new UserFactory)->create();

    $payload = [
        'first_name' => 'Alice',
        'last_name' => 'Smith',
        'email' => 'alice@example.com',
        'phone' => '987654321',
    ];

    $response = $this->actingAs($user)->postJson(route('companies.employees.store', [
        'company' => $company->id,
    ]), $payload);

    $response->assertStatus(201);
    $response->assertJsonFragment([
        'company_id' => $company->id,
    ]);

    $this->assertDatabaseHas('employees', array_merge($payload, [
        'company_id' => $company->id,
    ]));
});

test('it rejects invalid phone formats when storing an employee', function () {
    /** @var Company $company */
    $company = Company::factory()->createOne();
    $user = (new UserFactory)->create();

    $invalidPhones = [
        '12345678',
        '12345678a',
    ];

    foreach ($invalidPhones as $invalidPhone) {
        $payload = [
            'first_name' => 'Alice',
            'last_name' => 'Smith',
            'email' => "alice$invalidPhone@example.com",
            'phone' => $invalidPhone,
        ];

        $response = $this->actingAs($user)
            ->postJson(route('companies.employees.store', ['company' => $company->id]), $payload);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['phone']);
    }
});
