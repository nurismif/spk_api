<?php

namespace App\Providers;

use App\KriteriaAHP;
use App\Observers\KriteriaAHPObserver;
use App\Observers\UserObserver;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //Custom Event
        User::observe(UserObserver::class);
        KriteriaAHP::observe(KriteriaAHPObserver::class);
    }
}
