<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'digits:9'],
            'email' => [
                'required', 'email', 'max:255',
                Rule::unique('employees', 'email')->ignore($this->route('employee')->id),
            ],
        ];
    }

    public function authorize(): bool
    {
        return Gate::allows('update', $this->route('employee'));
    }
}
