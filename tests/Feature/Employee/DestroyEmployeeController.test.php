<?php

declare(strict_types=1);

use Itsmattch\Nfd\Http\Controllers\Employee\DestroyEmployeeController;
use Itsmattch\Nfd\Models\Company;
use Itsmattch\Nfd\Models\Employee;
use Workbench\Database\Factories\UserFactory;

covers(DestroyEmployeeController::class);

test('it deletes the employee for the given company', function () {
    /** @var Company $company */
    $company = Company::factory()->createOne();

    /** @var Employee $employee */
    $employee = Employee::factory()->create([
        'company_id' => $company->id,
    ]);

    $user = (new UserFactory)->create();

    $response = $this->actingAs($user)->deleteJson(route('companies.employees.destroy', [
        'company' => $company->id,
        'employee' => $employee->id,
    ]));

    $response->assertStatus(204);
    $this->assertDatabaseMissing('employees', [
        'id' => $employee->id,
    ]);
});
