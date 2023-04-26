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
        //
    }
}
