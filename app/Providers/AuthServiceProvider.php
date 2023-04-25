<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Models\Courses\Course;
use App\Policies\CoursePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        Course::class => CoursePolicy::class
    ];


    public function boot(): void
    {
        $this->registerPolicies();
        Gate::define('manage-course', function (User $user) {
            return $user->roles === 'administrator';
        });
        Gate::define('manage-chapter', function (User $user) {
            return $user->roles === 'administrator';
        });
        Gate::define('manage-lesson', function (User $user) {
            return $user->roles === 'administrator';
        });
    }
}
