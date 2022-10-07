<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\UserRule;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
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
    public function boot(Gate $gate)
    {
        $this->registerPolicies();

        $gate->define('admin', function ($user) {
            return $this->getUserRule($user->id, 'admin');
        });

        $gate->define('user', function ($user) {
            return $this->getUserRule($user->id, 'user');
        });

        Passport::routes();
        Passport::tokensExpireIn(Carbon::now()->addMinute(1440));
    }

    private function getUserRule($userId, $title)
    {
        $checkRule = UserRule::where('user_id', $userId)
            ->join('rules', 'user_rules.rule_id', '=', 'rules.id')
            ->where('rules.title', $title)
            ->count();
        return ($checkRule > 0);
    }
}
