<?php

declare(strict_types=1);

use Itsmattch\Nfd\Http\Controllers\Employee\ShowEmployeeController;
use Itsmattch\Nfd\Models\Company;
use Itsmattch\Nfd\Models\Employee;
use Workbench\Database\Factories\UserFactory;

covers(ShowEmployeeController::class);

test('it returns the employee for the given company based on id', function () {
    /** @var Company $company */
    $company = Company::factory()->createOne();

    /** @var Employee $employee */
    $employee = Employee::factory()->create([
        'company_id' => $company->id,
    ]);

    $user = (new UserFactory)->create();

    $response = $this->actingAs($user)->getJson(route('companies.employees.show', [
        'company' => $company->id,
        'employee' => $employee->id,
    ]));

    $response->assertStatus(200);
    $response->assertJsonFragment(['id' => $employee->id]);
});
