<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateEmployeeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            // TODO
        ];
    }

    public function authorize(): bool
    {
        return Gate::allows('update', $this->route('employee'));
    }
}
