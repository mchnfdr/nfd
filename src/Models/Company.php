<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Itsmattch\Nfd\Contract\Company as CompanyContract;
use Itsmattch\Nfd\Database\Factories\CompanyFactory;

class Company extends Model implements CompanyContract
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'city', 'tax_identifier', 'postal_code'];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    protected static function newFactory(): CompanyFactory
    {
        return new CompanyFactory;
    }
}
