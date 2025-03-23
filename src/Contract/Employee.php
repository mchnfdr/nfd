<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Contract;

use Carbon\Carbon;

/**
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string|null $phone
 * @property int $company_id
 * @property Company $company
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
interface Employee {}
