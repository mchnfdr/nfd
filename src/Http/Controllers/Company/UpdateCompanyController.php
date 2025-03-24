<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Http\Controllers\Company;

use Itsmattch\Nfd\Http\Controllers\Controller;
use Itsmattch\Nfd\Http\Requests\Company\UpdateCompanyRequest;
use Itsmattch\Nfd\Models\Company;

class UpdateCompanyController extends Controller
{
    public function __invoke(UpdateCompanyRequest $request, Company $company)
    {
        $company->update($request->validated());

        return response()->json($company);
    }
}
