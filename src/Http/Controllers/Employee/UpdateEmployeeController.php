<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Http\Controllers\Employee;

use Itsmattch\Nfd\Http\Controllers\Controller;
use Itsmattch\Nfd\Http\Requests\Employee\UpdateEmployeeRequest;
use Itsmattch\Nfd\Models\Company;
use Itsmattch\Nfd\Models\Employee;

class UpdateEmployeeController extends Controller
{
    public function __invoke(UpdateEmployeeRequest $request, Company $company, Employee $employee)
    {
        $employee->update($request->validated());

        return response()->json($employee);
    }
}
