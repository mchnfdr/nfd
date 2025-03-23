<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Http\Controllers\Employee;

use Itsmattch\Nfd\Contract\Company;
use Itsmattch\Nfd\Contract\Employee;
use Itsmattch\Nfd\Http\Controllers\Controller;
use Itsmattch\Nfd\Http\Requests\Employee\ShowEmployeeRequest;

class ShowEmployeeController extends Controller
{
    public function __invoke(ShowEmployeeRequest $request, Company $company, Employee $employee)
    {
        // TODO
    }
}
