<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Http\Controllers\Company;

use Itsmattch\Nfd\Contract\Company;
use Itsmattch\Nfd\Http\Controllers\Controller;
use Itsmattch\Nfd\Http\Requests\Company\ShowCompanyRequest;

class ShowCompanyController extends Controller
{
    public function __invoke(ShowCompanyRequest $request, Company $company)
    {
        //
    }
}
