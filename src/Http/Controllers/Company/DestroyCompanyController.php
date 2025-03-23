<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Http\Controllers\Company;

use Itsmattch\Nfd\Http\Controllers\Controller;
use Itsmattch\Nfd\Http\Requests\Company\DestroyCompanyRequest;
use Itsmattch\Nfd\Contract\Company;

class DestroyCompanyController extends Controller
{
    public function __invoke(DestroyCompanyRequest $request, Company $company)
    {
        //
    }
}
