<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Http\Controllers\Employee;

use Itsmattch\Nfd\Http\Controllers\Controller;
use Itsmattch\Nfd\Http\Requests\Employee\ShowEmployeeRequest;
use Itsmattch\Nfd\Models\Company;
use Itsmattch\Nfd\Models\Employee;
use Itsmattch\Nfd\Resources\EmployeeResource;

class ShowEmployeeController extends Controller
{
    public function __invoke(ShowEmployeeRequest $request, Company $company, Employee $employee)
    {
        return EmployeeResource::make($employee);
    }
}
