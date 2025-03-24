<?php

declare(strict_types=1);

namespace Itsmattch\Nfd\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Itsmattch\Nfd\Models\Company;
use Itsmattch\Nfd\Models\Employee;
use Itsmattch\Nfd\Policies\CompanyPolicy;
use Itsmattch\Nfd\Policies\EmployeePolicy;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->bootModels();
        $this->bootPolicies();
        $this->bootResources();
        $this->bootRoutes();
    }

    /**
     * REVIEW: Normally, Laravel automatically injects models into routes.
     * However, since we are outside a standard Laravel application scope,
     * we need to declare the models manually.
     */
    protected function bootModels(): void
    {
        Route::model('company', Company::class);
        Route::bind('employee', fn ($value, $route) => Employee::where('id', $value)
            ->where('company_id', $route->parameter('company')?->id)
            ->firstOrFail());
    }

    /**
     * REVIEW: We need to declare policies for uniform access control across
     * all resources. This approach simplifies our validation within FormRequests.
     */
    protected function bootPolicies(): void
    {
        Gate::policy(Company::class, CompanyPolicy::class);
        Gate::policy(Employee::class, EmployeePolicy::class);
    }

    /**
     * REVIEW: We load the package migrations here so that our database schema
     * is available without additional setup. This follows standard Laravel practices.
     */
    protected function bootResources(): void
    {
        $this->loadMigrationsFrom($this->packagePath('database/migrations'));
    }

    /**
     * REVIEW: This method registers all package routes and wraps them in the
     * standard middleware group, similar to routes/api.php in a typical Laravel application.
     * We prefix all routes with 'api/v1' to allow for future versioning if needed.
     */
    protected function bootRoutes(): void
    {
        Route::middleware('api')->prefix('api/v1')->scopeBindings()->group(function () {
            include $this->packagePath('routes/api.php');
        });
    }

    /** Helper function to build paths from the package root. */
    private function packagePath(string $path): string
    {
        return dirname(__DIR__, 2).'/'.$path;
    }
}
