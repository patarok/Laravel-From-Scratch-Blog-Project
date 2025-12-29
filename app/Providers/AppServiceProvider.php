<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Admin;
use App\Services\Newsletter;
use App\Services\MailchimpNewsletter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(Newsletter::class, function () {
            $client = (new ApiClient)->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us6'
            ]);

            return new MailchimpNewsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();

        Gate::define('admin', function (User $user) {
            // Cache for 24 hours
            $adminUsernames = Cache::remember('admin_usernames', now()->addDay(), function () {
                return Admin::pluck('name')->all();
            });
        
            // Just standard PHP here
            return in_array($user->username, $adminUsernames);
        });

        Blade::if('admin', function () {
            return request()->user()?->can('admin');
        });
    }
}
