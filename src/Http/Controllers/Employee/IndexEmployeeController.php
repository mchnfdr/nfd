<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Http\Controllers\Employee;

use Itsmattch\Nfd\Contract\Company;
use Itsmattch\Nfd\Http\Controllers\Controller;
use Itsmattch\Nfd\Http\Requests\Employee\IndexEmployeeRequest;
use Itsmattch\Nfd\Resources\EmployeeCollection;

class IndexEmployeeController extends Controller
{
    public function __invoke(IndexEmployeeRequest $request, Company $company)
    {
        return EmployeeCollection::make($company->employees);
    }
}
