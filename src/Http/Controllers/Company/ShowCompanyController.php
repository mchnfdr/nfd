<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Http\Controllers\Company;

use Itsmattch\Nfd\Http\Controllers\Controller;
use Itsmattch\Nfd\Http\Requests\Company\ShowCompanyRequest;
use Itsmattch\Nfd\Models\Company;
use Itsmattch\Nfd\Resources\CompanyResource;

class ShowCompanyController extends Controller
{
    public function __invoke(ShowCompanyRequest $request, Company $company)
    {
        return CompanyResource::make($company);
    }
}
