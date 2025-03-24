<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Http\Controllers\Company;

use Itsmattch\Nfd\Http\Controllers\Controller;
use Itsmattch\Nfd\Http\Requests\Company\StoreCompanyRequest;
use Itsmattch\Nfd\Models\Company;

class StoreCompanyController extends Controller
{
    public function __invoke(StoreCompanyRequest $request)
    {
        $company = Company::create($request->validated());

        return response()->json($company, 201);
    }
}
