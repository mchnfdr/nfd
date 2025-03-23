<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class ShowCompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('show', $this->route('company'));
    }
}
