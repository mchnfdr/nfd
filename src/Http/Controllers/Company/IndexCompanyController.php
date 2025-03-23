<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Http\Controllers\Company;

use Itsmattch\Nfd\Http\Controllers\Controller;
use Itsmattch\Nfd\Http\Requests\Company\IndexCompanyRequest;
use Itsmattch\Nfd\Models\Company;
use Itsmattch\Nfd\Resources\CompanyCollection;

class IndexCompanyController extends Controller
{
    public function __invoke(IndexCompanyRequest $request)
    {
        return CompanyCollection::make(Company::all());
    }
}
