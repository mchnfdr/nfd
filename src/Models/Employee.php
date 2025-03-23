<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Itsmattch\Nfd\Contract\Employee as EmployeeContract;
use Itsmattch\Nfd\Database\Factories\EmployeeFactory;

class Employee extends Model implements EmployeeContract
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'company_id'];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    protected static function newFactory(): EmployeeFactory
    {
        return new EmployeeFactory;
    }
}
