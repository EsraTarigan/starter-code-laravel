<?php

namespace App\Providers;


use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

    public static $permission = [
        // '$action' => 'role'
        'dashboard' => ['admin', 'user'],
        'index-user' => ['superadmin']

    ];

    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //gate::before ;; digunakan untuk permission superadmin bisa akses kemana aja
        Gate::before(function (User $user) {
            if ($user->role === 'superadmin') {
                return true;
            }
        });

        // <!--membuat permissions  cara 1-->
        foreach (self::$permission as $action => $roles) {
            Gate::define($action, function (User $user) use ($roles) {
                if (in_array($user->role, $roles)) {
                    return true;
                }
            });
        }
    }
}
