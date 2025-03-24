<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Itsmattch\Nfd\Models\Employee;

class StoreEmployeeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'digits:9'],
            'email' => ['required', 'email', 'max:255', 'unique:employees,email'],
        ];
    }

    public function authorize(): bool
    {
        return Gate::allows('store', Employee::class);
    }
}
