<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Itsmattch\Nfd\Models\Company;

class StoreCompanyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            // TODO
        ];
    }

    public function authorize(): bool
    {
        return Gate::allows('store', Company::class);
    }
}
