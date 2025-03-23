<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    protected $fillable = ['name', 'address', 'city', 'tax_identifier', 'postal_code'];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
