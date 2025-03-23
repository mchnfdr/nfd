<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Itsmattch\Nfd\Contract\Employee as EmployeeContract;

class Employee extends Model implements EmployeeContract
{
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'company_id'];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
