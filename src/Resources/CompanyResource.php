<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Itsmattch\Nfd\Contract\Company as CompanyContract;

class CompanyResource extends JsonResource implements CompanyContract
{
    public function toArray(Request $request): array
    {
        return [
            // TODO
        ];
    }
}
