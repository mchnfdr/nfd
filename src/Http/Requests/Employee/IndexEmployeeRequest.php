<?php

namespace Itsmattch\Nfd\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class IndexEmployeeRequest extends FormRequest
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
