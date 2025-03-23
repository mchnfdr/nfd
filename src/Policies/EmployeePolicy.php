<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Policies;

use Illuminate\Contracts\Auth\Authenticatable;
use Itsmattch\Nfd\Contract\Employee;

/**
 * REVIEW: For the purpose of this app, we'll assume that this is
 * an internal app and that any authenticated user can perform any action.
 *
 * In a real-world scenario, we might replace this with a more
 * sophisticated permissions system, such as using spatie/laravel-permission.
 */
class EmployeePolicy
{
    public function index(Authenticatable $user): bool
    {
        return true;
    }

    public function show(Authenticatable $user, Employee $employee): bool
    {
        return true;
    }

    public function store(Authenticatable $user): bool
    {
        return true;
    }

    public function update(Authenticatable $user, Employee $employee): bool
    {
        return true;
    }

    public function destroy(Authenticatable $user, Employee $employee): bool
    {
        return true;
    }
}
