<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Itsmattch\Nfd\Models\Employee;

class IndexEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('index', Employee::class);
    }
}
