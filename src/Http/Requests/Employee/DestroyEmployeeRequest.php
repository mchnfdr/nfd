<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class DestroyEmployeeRequest extends FormRequest
{
    public function rules(): array
    {
        return [

        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
