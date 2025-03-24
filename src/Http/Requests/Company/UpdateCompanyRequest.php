<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateCompanyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'digits:5'],
            'tax_identifier' => [
                'required', 'digits:10',
                Rule::unique('companies', 'tax_identifier')->ignore($this->route('company')->id),
            ],
        ];
    }

    public function authorize(): bool
    {
        return Gate::allows('update', $this->route('company'));
    }
}
