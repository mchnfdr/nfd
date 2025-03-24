<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Http\Controllers\Employee;

use Itsmattch\Nfd\Http\Controllers\Controller;
use Itsmattch\Nfd\Http\Requests\Employee\DestroyEmployeeRequest;
use Itsmattch\Nfd\Models\Company;
use Itsmattch\Nfd\Models\Employee;

class DestroyEmployeeController extends Controller
{
    public function __invoke(DestroyEmployeeRequest $request, Company $company, Employee $employee)
    {
        return $employee->delete()
            ? response()->json(status: 204)
            : response()->json(status: 500);
    }
}
