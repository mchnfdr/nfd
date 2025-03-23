<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Itsmattch\Nfd\Contract\Employee as EmployeeContract;

class EmployeeResource extends JsonResource implements EmployeeContract
{
    public function toArray(Request $request): array
    {
        return [
            // TODO
        ];
    }
}
