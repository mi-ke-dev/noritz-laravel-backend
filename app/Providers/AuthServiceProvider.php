<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Domain\ClaimForms\Models\RGA1ClaimForm;
use App\Domain\ClaimForms\Models\RGA2ClaimForm;
use App\Domain\ClaimForms\Models\RMAClaimForm;
use App\Domain\ClaimForms\Policies\RGA1ClaimFormPolicy;
use App\Domain\ClaimForms\Policies\RGA2ClaimFormPolicy;
use App\Domain\ClaimForms\Policies\RMAClaimFormPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        RGA1ClaimForm::class => RGA1ClaimFormPolicy::class,
        RGA2ClaimForm::class => RGA2ClaimFormPolicy::class,
        RMAClaimForm::class => RMAClaimFormPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $_ENV['AWS_BUCKET'] = $_ENV['AWS_BUCKET'] ?? config('filesystems.disks.s3.bucket');
        $_ENV['AWS_DEFAULT_REGION'] = $_ENV['AWS_DEFAULT_REGION'] ?? config('filesystems.disks.s3.region');
        $_ENV['AWS_ACCESS_KEY_ID'] = $_ENV['AWS_ACCESS_KEY_ID'] ?? config('filesystems.disks.s3.key');
        $_ENV['AWS_SECRET_ACCESS_KEY'] = $_ENV['AWS_SECRET_ACCESS_KEY'] ?? config('filesystems.disks.s3.secret');

        foreach (config('nova-permissions.permissions') as $key => $permissions) {
            Gate::define($key, function (User $user) use ($key) {
                if ($this->nobodyHasAccess($key)) {
                    return true;
                }

                return $user->hasPermissionTo($key);
            });
        }

        Gate::define('uploadFiles', function ($user, $post) {
            return true;
        });

        //
    }
}
