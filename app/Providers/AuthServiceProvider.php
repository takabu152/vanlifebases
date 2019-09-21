<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        // システム管理者のみ許可
        Gate::define('system-only', function ($user) {
            return ($user->usertypeflg == 9);
        });
        // ホスト以上（施設オーナー＆システム管理者）に許可
        Gate::define('host-higher', function ($user) {
            return ($user->usertypeflg == 1 || $user->usertypeflg == 9);
        });
        // 一般ユーザ以上（つまり全権限）に許可・・今の所一般ユーザのみ
        Gate::define('user-higher', function ($user) {
            return ($user->usertypeflg == 0);
        });
    }
}
