<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateCompanyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            // TODO
        ];
    }

    public function authorize(): bool
    {
        return Gate::allows('update', $this->route('company'));
    }
}
