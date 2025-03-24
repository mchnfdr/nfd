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
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'digits:5'],
            'tax_identifier' => ['required', 'string', 'digits:10', 'unique:companies,tax_identifier'],
        ];
    }

    public function authorize(): bool
    {
        return Gate::allows('store', Company::class);
    }
}
