<?php

declare(strict_types=1);

use Itsmattch\Nfd\Database\Factories\EmployeeFactory;
use Itsmattch\Nfd\Http\Controllers\Employee\IndexEmployeeController;
use Workbench\Database\Factories\UserFactory;

covers(IndexEmployeeController::class);

/*
 * REVIEW Normally I'd have coded every single controller, but since there's no
 * advanced permissions management, I'm going to write a test just to see if
 * the policies are booted correctly, using IndexEmployeeController as an example.
 */

beforeEach(function () {
    $this->employee = (new EmployeeFactory)->create();
});

it('does not allow access to guests', function () {
    $response = $this->get(route('companies.employees.index', [
        'company' => $this->employee->company->id,
    ]));

    $response->assertStatus(403);
});

it('allows access to users', function () {
    $user = (new UserFactory)->create();

    $response = $this->actingAs($user)->get(route('companies.employees.index', [
        'company' => $this->employee->company->id,
    ]));

    $response->assertStatus(200);
});
