<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CompanyCollection extends ResourceCollection
{
    public static $wrap = false;

    public $resource = CompanyResource::class;

    public function toArray(Request $request): array
    {
        return $this->collection->toArray();
    }
}
