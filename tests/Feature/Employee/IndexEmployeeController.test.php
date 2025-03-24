<?php

declare(strict_types=1);

use Itsmattch\Nfd\Http\Controllers\Employee\IndexEmployeeController;
use Itsmattch\Nfd\Models\Company;
use Itsmattch\Nfd\Models\Employee;
use Workbench\Database\Factories\UserFactory;

covers(IndexEmployeeController::class);

test('it returns all employees for the given company', function () {

    $user = (new UserFactory)->create();

    /** @var Company $company */
    $company = Company::factory()->createOne();

    Employee::factory()->count(2)->create();
    Employee::factory()->count(3)->create([
        'company_id' => $company->id,
    ]);

    $response = $this->actingAs($user)->getJson(route('companies.employees.index', [
        'company' => $company->id,
    ]));

    $response->assertJsonCount(3);
    $response->assertExactJsonStructure([
        '*' => ['id', 'first_name', 'last_name', 'email', 'phone', 'company_id'],
    ]);
});
