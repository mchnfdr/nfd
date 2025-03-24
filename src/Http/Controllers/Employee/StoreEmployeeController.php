<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Http\Controllers\Employee;

use Itsmattch\Nfd\Http\Controllers\Controller;
use Itsmattch\Nfd\Http\Requests\Employee\StoreEmployeeRequest;
use Itsmattch\Nfd\Models\Company;
use Itsmattch\Nfd\Models\Employee;

class StoreEmployeeController extends Controller
{
    public function __invoke(StoreEmployeeRequest $request, Company $company)
    {
        $data = $request->validated();
        $data['company_id'] = $company->id;

        $employee = Employee::create($data);

        return response()->json($employee, 201);
    }
}
