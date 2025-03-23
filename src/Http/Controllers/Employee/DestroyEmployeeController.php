<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Http\Controllers\Employee;

use Itsmattch\Nfd\Contract\Company;
use Itsmattch\Nfd\Contract\Employee;
use Itsmattch\Nfd\Http\Controllers\Controller;
use Itsmattch\Nfd\Http\Requests\Employee\DestroyEmployeeRequest;

class DestroyEmployeeController extends Controller
{
    public function __invoke(DestroyEmployeeRequest $request, Company $company, Employee $employee)
    {
        // TODO
    }
}
