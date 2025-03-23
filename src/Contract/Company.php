<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Contract;

use Carbon\Carbon;
use Illuminate\Support\Collection;

/**
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $city
 * @property string $postal_code
 * @property string $tax_identifier
 * @property Collection<int, Employee> $employees
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
interface Company {}
